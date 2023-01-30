<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CartTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
    
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Сибирские');
            $browser->waitFor('.product-list');
            $browser->scrollTo('.product-list');
//            $browser->clickLink('в корзину');
            $browser->pause(1000);
            $browser->click('.add-to-cart');
//            foreach($browser->elements('.add-to-cart') as $toCart) {
//            $browser->click($toCart);
//                $browser->pause(1000);
//            }
            $browser->waitForTextIn('.cart-accent', '1', 1);
            $browser->assertSeeIn('.cart-accent', '1');
        });
    }
}
