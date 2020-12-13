<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SyncController extends CI_Controller
{
    private $rootdir = '';
    private $dir = '';
    private $gs = '';
    private $table = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        if (empty($this->rootdir) or empty($this->dir) or empty($this->gs) or empty($this->table)) {
            echo "PLEASE FILL VARIABLE MANDATORY";
            die;
        }
    }

    public function index()
    {
        $books = glob($this->rootdir . '/' . '*{.pdf,.PDF}', GLOB_BRACE);
        $count_book_uploaded = 0;
        foreach ($books as $book) {
            $info = pathinfo($book);
            try {

                $data_insert_book = [
                    'book_title' => strtoupper($info['filename']),
                    'date_added' => date('Y-m-d H:i:s')
                ];
                $this->db->insert($this->table, $data_insert_book);
                $book_id = $this->db->insert_id();

                $book_dir = $this->dir . '/' . $book_id;

                $book_file = $book_id . '.pdf';
                $book_image = $book_id . '.jpg';
                $book_image_thumb = $book_id . '_thumb.jpg';

                mkdir($book_dir, 0777);
                chmod($book_dir, 0777);

                $path_book_image = $book_dir . '/' . $book_image;
                $gscommand = "{$this->gs} -q -dQUIET -dSAFER -dBATCH -dNOPAUSE -dNOPROMPT -dMaxBitmap=500000000 -dAlignToPixels=0 -dGridFitTT=2 -sDEVICE=jpeg -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dLastPage=1 -dUseCropBox -r150  -sOutputFile='{$path_book_image}' '{$book}'";
                exec($gscommand);
                chmod($path_book_image, 0777);

                $path_book_thumb = $book_dir . '/' . $book_image_thumb;
                $this->image_resize($path_book_image, 150, TRUE);
                chmod($path_book_thumb, 0777);

                $path_book_file = $book_dir . '/' . $book_file;
                copy($book, $path_book_file);
                chmod($path_book_file, 0777);
                $data_update_book = [
                    'book_image' => $book_image,
                    'book_thumb_image' => $book_image_thumb,
                    'book_file' => $book_file
                ];

                $this->db->update($this->table, $data_update_book, array('book_id' => $book_id));

                unlink($book);

                echo "<span style='color:green;'>(SUCCESS) </span>" . $info['basename'] . "</br>";

                $count_book_uploaded += 1;

                flush();
                ob_flush();
            } catch (\Throwable $th) {
                echo "<span style='color:red;'>(FAILED) </span>" . $info['basename'] . ' -> ' . $th->getMessage() . "<br/>";
                continue;
            }
        }
        echo "<b>TOTAL BOOK HAS UPLOADED : {$count_book_uploaded}</b>";
    }

    public function image_resize($path, $width, $thumbnail = FALSE)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['maintain_ration'] = TRUE;
        $config['width'] = $width;
        $config['quality'] = 100;
        $config['create_thumb'] = $thumbnail;

        $this->image_lib->initialize($config);

        return $this->image_lib->resize();
    }
}
