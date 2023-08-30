<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\DeliveryCharge;
use App\Models\Page;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['site_information', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy'],
            ['site_map', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.006849838867!2d85.30993861498808!3d27.717074782787982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb194c6c187511%3A0x90398cc153754317!2sParadise%20InfoTech%20-%20IT%20Company%20in%20Nepal!5e0!3m2!1sen!2snp!4v1679805612838!5m2!1sen!2snp'],
            ['site_contact', '+977-9842332001'],
            ['site_email', 'info@pustakalaya.com'],
            ['site_location', ' Shankhamul, Kathmandu,Nepal'],
            ['site_name', 'Pustakalaya'],
            ['site_location_url', 'https://pustakalaya.com.np/'],
            ['site_copyright', 'Copyright © 2023. All Rights Reserved'],
            ['fav_icon', null],

            ['homepage_seo_title', 'Pustakalaya'],
            ['homepage_seo_description', 'Pustakalaya'],
            ['homepage_seo_keywords', 'Pustakalaya'],


            ['about_page_banner', null],
            ['team_page_banner', null],
            ['blog_page_banner', null],
            ['single_page_banner', null],
            ['package_page_banner', null],
            ['feature_banner', null],
            ['contact_image', null],

            ['contact_section_description', 'We love to hear from you. Our friendly team is always here to chat'],
            ['contact_seo_title', 'Pustakalaya - Contact'],
            ['contact_seo_keywords', 'Pustakalaya '],
            ['contact_seo_description', 'Pustakalaya'],

            ['products_seo_title', 'Pustakalaya - products'],
            ['products_seo_keywords', 'products'],
            ['products_seo_description', 'products pustakalaya'],

            ['categories_seo_title', 'Pustakalaya - categories'],
            ['categories_seo_keywords', 'categories'],
            ['categories_seo_description', 'categories pustakalaya'],

            ['blogs_seo_title', 'Pustakalaya - blogs'],
            ['blogs_seo_keywords', 'blogs'],
            ['blogs_seo_description', 'blogs pustakalaya'],

        ];

        if (count($items)) {
            foreach ($items as $item) {
                \App\Models\Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'first_name' => 'Super Admin',
            'last_name' => '',
            'email' => 'admin@pustakalaya.com',
            'password' => 'password',
            'user_type' => 'Administrator'
        ]);

        User::factory(5)->create();

        $pages = [
            ['title' => 'Privacy Policy', 'description' => 'Lorem ipsum dolor sit amet consectetur. Enim nulla at ultrices mus porttitor. Cursus sed eu neque fringilla sed maecenas lorem vulputate tristique. Mollis massa nulla vulputate eget imperdiet nc fringilla fermentum hendrerit sagittis praesent nulla nulla. Erat nascetur ut tortor nam faucibus amet tincidunt luctus nibh. Elementum massa parturient pellentesque egestas potenti et. Diam vulputate convallis sed purus eros ac amet erat risus. Lectus quisque elementum a velit urna nulla. Sit augue vestibulum gravida ante duis vitae. Rhoncus donec mi sed metus sed cursus sed. Cursus molestie vel nisi cursus amet. A viverra magnis mattis ultrices diam dapibus. Quam amet purus lacus vitae sapien viverra sit sapien. Aenean tincidunt orci diam at amet commodo eget.', 'short_description' => null, 'slug' => 'privacy-policy', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Terms and Conditions', 'description' => 'Lorem ipsum dolor sit amet consectetur. Enim nulla at ultrices mus porttitor. Cursus sed eu neque fringilla sed maecenas lorem vulputate tristique. Mollis massa nulla vulputate eget imperdiet nc fringilla fermentum hendrerit sagittis praesent nulla nulla. Erat nascetur ut tortor nam faucibus amet tincidunt luctus nibh. Elementum massa parturient pellentesque egestas potenti et. Diam vulputate convallis sed purus eros ac amet erat risus. Lectus quisque elementum a velit urna nulla. Sit augue vestibulum gravida ante duis vitae. Rhoncus donec mi sed metus sed cursus sed. Cursus molestie vel nisi cursus amet. A viverra magnis mattis ultrices diam dapibus. Quam amet purus lacus vitae sapien viverra sit sapien. Aenean tincidunt orci diam at amet commodo eget.', 'short_description' => null, 'slug' => 'terms-and-conditions', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'About', 'description' => 'Lorem ipsum dolor sit amet consectetur. Enim nulla at ultrices mus porttitor. Cursus sed eu neque fringilla sed maecenas lorem vulputate tristique. Mollis massa nulla vulputate eget imperdiet nc fringilla fermentum hendrerit sagittis praesent nulla nulla. Erat nascetur ut tortor nam faucibus amet tincidunt luctus nibh. Elementum massa parturient pellentesque egestas potenti et. Diam vulputate convallis sed purus eros ac amet erat risus. Lectus quisque elementum a velit urna nulla. Sit augue vestibulum gravida ante duis vitae. Rhoncus donec mi sed metus sed cursus sed. Cursus molestie vel nisi cursus amet. A viverra magnis mattis ultrices diam dapibus. Quam amet purus lacus vitae sapien viverra sit sapien. Aenean tincidunt orci diam at amet commodo eget.', 'short_description' => null, 'slug' => 'about', 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Page::insert($pages);

        $socialmedias = [
            ['title' => 'Facebook', 'link' => '#',   'icon' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Twitter', 'link' => '#',    'icon' => 'fa-twitter', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Instagram', 'link' => '#',  'icon' => 'fa-instagram', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Linkedin', 'link' => '#',  'icon' => 'fa-linkedin', 'created_at' => now(), 'updated_at' => now()],
        ];

        SocialMedia::insert($socialmedias);

        $products = [
            ['name' => 'Youth and Truth', 'is_popular' => 1, 'status' => '1', 'slug' => 'youth-and-truth', 'description' => 'abcdef',   'price' => 9000, 'mrp' => 10000, 'discount' => 10, 'rating' => '3', 'featured_image' => 'youthtrust.jfif', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antramanko Yatra', 'is_popular' => 1, 'status' => '1', 'slug' => 'antramanko-yatra', 'description' => 'abcdef',    'price' => 800,  'mrp' => 1000, 'discount' => 20, 'rating' => '4', 'featured_image' => 'antamarnayatra.jfif', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autobiography of Yogi', 'is_popular' => 1, 'status' => '1', 'slug' => 'autobiography-of-yogi', 'description' => 'abcdef',  'price' => 1000, 'mrp' => 2000, 'discount' => 50, 'rating' => '4', 'featured_image' => 'ayogi.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mero Bhumi', 'is_popular' => 1, 'status' => '1', 'slug' => 'mero-bhumi', 'description' => 'abcdef',  'price' => 15000,  'mrp' => 15000, 'discount' => NULL, 'rating' => '5', 'featured_image' => 'merobhumi.jfif', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karnali Blues', 'is_popular' => 1, 'status' => '1', 'slug' => 'karnali-blues', 'description' => 'abcdef',  'price' => 25000,  'mrp' => 25000, 'discount' => NULL, 'rating' => '2', 'featured_image' => 'karnaliblues.jfif', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jiyara', 'is_popular' => 1, 'status' => '1', 'slug' => 'jiyara', 'description' => 'abcdef',  'price' => 12500,  'mrp' => 25000, 'discount' => 50, 'rating' => '4', 'featured_image' => 'Jiyara.jfif', 'created_at' => now(), 'updated_at' => now()],
        ];

        Product::insert($products);

        $categories = [
            ['name' => 'School Books', 'status' => '1', 'slug' => 'school-books', 'description' => 'abcdef',   'parent_id' => 0, 'is_featured' => 1, 'order' => 1, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'College Books', 'status' => '1', 'slug' => 'college-books', 'description' => 'abcdef',    'parent_id' => 0,  'is_featured' => 1,  'order' => 2, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CTEVT Books', 'status' => '1', 'slug' => 'ctevt-books', 'description' => 'abcdef',  'parent_id' => 0, 'is_featured' => 1,  'order' => 3, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bachelor Level Books', 'status' => '1', 'slug' => 'bachelor-level-books', 'description' => 'abcdef',  'parent_id' => 0,  'is_featured' => 1, 'order' => 4, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Master Level Books', 'status' => '1', 'slug' => 'master-level-books', 'description' => 'abcdef',  'parent_id' => 0,  'is_featured' => 1,  'order' => 5, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Competation Exam Books', 'status' => '1', 'slug' => 'competation-exam-books', 'description' => 'abcdef',  'parent_id' => 0,  'is_featured' => 1,  'order' => 5, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Novels and More', 'status' => '1', 'slug' => 'novels-and-more', 'description' => 'abcdef',  'parent_id' => 0,  'is_featured' => 1,  'order' => 5, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Childrens Story Books', 'status' => '1', 'slug' => 'childrens-story-books', 'description' => 'abcdef',  'parent_id' => 0,  'is_featured' => 1,  'order' => 5, 'image' => NULL, 'created_at' => now(), 'updated_at' => now()],
        ];

        Category::insert($categories);

        $blogs = [
            ['title' => 'Blog 1',   'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis unde excepturi, dolore consequatur commodi autem aliquid distinctio animi eius?', 'image' => null, 'description' => null, 'slug' => 'blog-1', 'date' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Blog 2',   'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis unde excepturi, dolore consequatur commodi autem aliquid distinctio animi eius?', 'image' => null, 'description' => null, 'slug' => 'blog-2', 'date' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Blog 3',   'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis unde excepturi, dolore consequatur commodi autem aliquid distinctio animi eius?', 'image' => null, 'description' => null, 'slug' => 'blog-3', 'date' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
            ['title' => 'Blog 4',   'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam officiis unde excepturi, dolore consequatur commodi autem aliquid distinctio animi eius?', 'image' => null, 'description' => null, 'slug' => 'blog-4', 'date' => date('Y-m-d h:i:s'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
        ];

        Blog::insert($blogs);

        $banners = [
            ['image' => 'center.jpg', 'category' => 'Center', 'dimension' => '1460 x 390', 'link' => '#', 'position' => 'Center', 'status' => '1',  'created_at' => now(), 'updated_at' => now()],
            ['image' => 'bottom1.jpeg', 'category' => 'Bottom', 'dimension' => '750 x 267', 'link' => '#', 'position' => 'Bottom 1', 'status' => '1',  'created_at' => now(), 'updated_at' => now()],
            ['image' => 'bottom2.jpeg', 'category' => 'Bottom', 'dimension' => '750 x 267', 'link' => '#', 'position' => 'Bottom 2', 'status' => '1',  'created_at' => now(), 'updated_at' => now()],
        ];

        Banner::insert($banners);

        $payments = [
            ['image' => 'esewa.jpg', 'name' => 'esewa',  'order' => '1',  'created_at' => now(), 'updated_at' => now()],
            ['image' => 'khalti.png', 'name' => 'khalti',  'order' => '2',  'created_at' => now(), 'updated_at' => now()],
        ];

        PaymentGateway::insert($payments);

        $deliveryCharges = [
            ['title' => 'Inside Kathmandu Valley', 'price' => 100,   'order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Outside Kathmandu Valley', 'price' => 300,  'order' => 2, 'created_at' => now(), 'updated_at' => now()],
        ];

        DeliveryCharge::insert($deliveryCharges);
    }
}
