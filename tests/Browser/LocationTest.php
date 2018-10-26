<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LocationTest extends DuskTestCase
{

    /**
     * A test for a location input with no details
     *
     * @return void
     */
    public function testEmptyInputs()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('Submit')
                ->assertSee('Please input latitude')
                ->assertSee('Please input longitude');
        });
    }

    /**
     * A test for a location input with no latitude
     *
     * @return void
     */
    public function testEmptyLatitude()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('longitude', '-1.6')
                ->press('Submit')
                ->assertSee('Please input latitude')
                ->assertDontSee('Please input longitude');
        });
    }

    /**
     * A test for a location input with invalid latitude
     *
     * @return void
     */
    public function testInvalidLatitude()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('latitude', 'aabbcc')
                ->press('Submit')
                ->assertSee('Please input a numeric latitude');
        });
    }


    /**
     * A test for a correct location input
     *
     * @return void
     */
    public function testValidLocation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('latitude', '55')
                ->type('longitude', '-1.6')
                ->press('Submit')
                ->assertSee('This is the closest casino to the following location: 55,-1.6')
                ->assertDontSee('Please input latitude')
                ->assertDontSee('Please input longitude');
        });
    }

}
