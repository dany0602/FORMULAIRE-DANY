<?php
Class Likes {

    /**
     * Permet de compter les likes d'une publication
     * 
     * @param INT $post_id l'ID du post
     * @return INT $countLikes Nombres de likes sur le post
     * 
     */
    public static function showLikes($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(like_id) as `likes`
            FROM 76_likes
            WHERE post_id = " . $post_id;

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $countLikes = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = '';
        return $countLikes['likes'];
    }

}