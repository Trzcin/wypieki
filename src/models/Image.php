<?php
class Image
{
    private $db;

    public function __construct()
    {
        $this->db = Database::get_db();
    }

    public function create(
        string $title,
        string $author,
        string $watermark,
        string $path,
        string $thumbnail,
        bool $public
    ) {
        $this->db->images->insertOne([
            'title' => $title,
            'author' => $author,
            'watermark' => $watermark,
            'path' => $path,
            'thumbnail' => $thumbnail,
            'public' => $public
        ]);
    }

    public function getSome(string $name, $skip, $limit)
    {
        if ($name != '') {
            $images = $this->db->images->find(['$or' => [
                [
                    'public' => false,
                    'author' => $name
                ],
                [
                    'public' => true
                ]
            ]], [
                'skip' => $skip,
                'limit' => $limit
            ])->toArray();
        } else {
            $images = $this->db->images->find(['public' => true], ['skip' => $skip, 'limit' => $limit])->toArray();
        }
        return $images;
    }

    public function count(string $name)
    {
        if ($name != '') {
            $count = $this->db->images->count(['$or' => [
                [
                    'public' => false,
                    'author' => $name
                ],
                [
                    'public' => true
                ]
            ]]);
        } else {
            $count = $this->db->images->count(['public' => true]);
        }
        return $count;
    }

    public function getByIds(string $name, array $ids)
    {
        if ($name != '') {
            $personal_images = $this->db->images->find(
                [
                    'public' => false,
                    'author' => $name,
                    '_id' => ['$in' => Database::toObjectIDArray($ids)]
                ]
            )->toArray();
            $all_images = $this->db->images->find(['public' => true, '_id' => ['$in' => Database::toObjectIDArray($ids)]])->toArray();
            return array_merge($personal_images, $all_images);
        } else {
            $images = $this->db->images->find(['public' => true, '_id' => ['$in' => Database::toObjectIDArray($ids)]])->toArray();
            return $images;
        }
    }

    public function search($name, $query)
    {
        if ($name != '') {
            $images = $this->db->images->find(['$or' => [
                [
                    'public' => false,
                    'author' => $name,
                    'title' => new MongoDB\BSON\Regex($query, 'i')
                ],
                [
                    'public' => true,
                    'title' => new MongoDB\BSON\Regex($query, 'i')
                ]
            ]])->toArray();
        } else {
            $images = $this->db->images->find(['public' => true, 'title' => new MongoDB\BSON\Regex($query, 'i')])->toArray();
        }
        return $images;
    }

    public function is_image_valid($image)
    {
        $file_size = $image['size'];
        $file_type = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $is_image = getimagesize($image['tmp_name']);
        if (
            $file_size > MB ||
            $is_image === false ||
            ($file_type != 'png' && $file_type != 'jpg' && $file_type != 'jpeg')
        ) {
            return false;
        } else {
            return true;
        }
    }

    public function createThumbnail(string $path_original, string $path_thumbnail)
    {
        $img_data = file_get_contents($path_original);
        $img_rescource = imagecreatefromstring($img_data);

        $thumbnail_width = 200;
        $thumbnail_height = 125;
        $thumbnail = imagescale($img_rescource, $thumbnail_width, $thumbnail_height);

        imagejpeg($thumbnail, $path_thumbnail);

        imagedestroy($img_rescource);
        imagedestroy($thumbnail);
    }

    public function addWatermark(string $path, string $watermark_path, string $watermark)
    {
        $img_data = file_get_contents($path);
        $img = imagecreatefromstring($img_data);

        $color = imagecolorallocatealpha($img, 255, 255, 255, 80);
        $font = APP_ROOT . '/web/static/fonts/comic-sans.ttf';
        $font_size = 150;
        $angle = 0;

        $textbox = imagettfbbox($font_size, $angle, $font, $watermark);
        $text_x = (imagesx($img) - $textbox[4]) / 2;
        $text_y = (imagesy($img) - $textbox[5]) / 2;

        imagettftext(
            $img,
            $font_size,
            $angle,
            $text_x,
            $text_y,
            $color,
            $font,
            $watermark
        );
        imagepng($img, $watermark_path);

        imagedestroy($img);
    }
}
