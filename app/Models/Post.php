<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
            "title" => "Blog Pertama",
            "slug" => "blog-pertama",
            "author" => "Wiyan Barkah Elmansyah",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt modi ea optio, cumque rerum sunt officiis quis animi laboriosam repudiandae, non minus quidem at ipsam. Deserunt vel nulla aspernatur debitis voluptas omnis. Nostrum eveniet impedit dicta rerum tempora, veritatis, amet maiores temporibus officia aliquid obcaecati culpa incidunt nisi repellat aperiam optio esse? Odio eius perspiciatis possimus, beatae quidem veritatis blanditiis vitae! Accusamus quas fugit corrupti distinctio, mollitia eius, tempora omnis possimus expedita, rerum molestiae. Dolore itaque eos totam ullam, alias qui veniam ipsa optio sed, esse aliquam molestias ad earum? Natus facilis iure eaque vel, culpa tempore consequuntur quisquam est."
        ],
        [
            "title" => "Blog Kedua",
            "slug" => "blog-kedua",
            "author" => "Peter Parker",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem minus praesentium blanditiis obcaecati aspernatur dolore. Temporibus mollitia itaque enim libero dolorem? Ad qui nobis rem quibusdam distinctio fuga repudiandae aliquam consequuntur nesciunt animi ex consectetur maxime perspiciatis placeat enim est dignissimos eum saepe, eligendi ea magni quod aliquid soluta! Vero, praesentium atque. Sed, iusto. Esse, a recusandae ducimus vero perferendis alias earum voluptatibus nihil repellat cum ipsum porro eveniet commodi quibusdam ullam, libero, placeat quos totam quaerat sapiente iusto quod architecto optio. Animi beatae deserunt laboriosam quis eaque tempore quod, totam corrupti qui praesentium! Ad reiciendis reprehenderit minus maiores dolorem quibusdam nostrum? Beatae, assumenda corrupti nulla maxime placeat ex natus nostrum optio enim quasi temporibus dicta animi ea accusantium nisi."
        ]
    ];

    public static function all() 
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
