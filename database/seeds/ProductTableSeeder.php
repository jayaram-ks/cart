<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new App\Product(['title'=>'Apple iPhone X with FaceTime - 256GB, 4G-LTE, Silver',
        'description'=>'Apple iPhone X features Face ID to unlock, pay, and authenticate. This iPhone X has a 5.8 Super Retina screen.Apple iPhone X dramatically enhances the most important aspects of the iPhone experience. Introducing an entire screen design, iPhone X is so intelligent that it can respond to a tap, your voice, and even a glance. A 5.8inch Super Retina screen dazzles the eyes and fills the hands. This iPhone has the most durable glass ever that is resistant to water and dust. Thanks to the most secure authentication, this Apple Phone features Face ID to unlock, pay, and authenticate. All the more, this mind-blowing phone has the TrueDepth camera that features portrait mode and portrait lighting. It has a larger and faster 12MP sensor. Furthermore, both the rear cameras feature optical image stabilization. Introducing the all new Animojis that analyzes more than 50 different muscle movements to express your emotions. Powered by the A11 Bionic chip, the CPU of this phone is capable of performing 600 billion operations per second. The custom battery design now lasts approximately two hours longer between charges than the previous model. Designed with the iOS11 operating system, this phone lets you experience mind blowing performance. The all new iPhone X in the silver finish has 256GB memory.',
        'price' => 4499,
        'slug' => str_slug('Apple iPhone X with FaceTime - 256GB, 4G-LTE, Silver'),
        'imagePath' => 'iphone.jpg',
        'meta_key' => 'Apple iPhone X with FaceTime - 256GB, 4G-LTE, Silver',
        'meta_description' => 'Apple iPhone X with FaceTime - 256GB, 4G LTE, Silver, price, review and buy in Dubai, Abu Dhabi and rest of United Arab Emirates',
        'tag' =>"phone,mobile,smartphone",'avg_rating'=>5]);$product ->save();
    }
}
