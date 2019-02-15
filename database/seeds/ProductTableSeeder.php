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
        //création des genres
        App\Category::create([
            'title' => 'homme'
        ]);
        App\Category::create([
            'title' => 'femme'
        ]);


        //on prendra garde de bien supprimer les images avant de commencer les seeders
        Storage::disk('local')->delete(Storage::allFiles());
        factory(App\Product::class, 30)->create()->each(function($product){
            //associer une category à une produit créé
            $category = App\Category::find(rand(1,2));
            
            //pour chaque $book on lui associe un genre en particulier
            $product ->category()->associate($category);
            
            //ajout des images
            //on utilise un site en ligne pour récupérer des images aléatoirement
            $link = str_random(12) . '.jpg'; // hash de lien pour la sécurité(injection de scripts protection)
            $file = file_get_contents('http://placeimg.com/375/300/people'); //flux
            

            $product->update([
                'url_image' => $link
            ]);

            

            Storage::disk('local')->put($link, $file);
        
            $product->save();   
        });
    }
}
