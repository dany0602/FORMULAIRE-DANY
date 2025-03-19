<?php
class Comments
{

    public static function MontrerNombresCommentaires($post)
    {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT count(*) as `total` FROM `76_comments` WHERE `post_id` = " . $post;
        $stmt = $pdo->query($sql);
        $countComments = $stmt->fetch(PDO::FETCH_ASSOC);
        $pdo = '';
        return $countComments['total'];
    }
}
