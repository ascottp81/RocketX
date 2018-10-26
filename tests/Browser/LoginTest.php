<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    /**
     * A test for a login with no details
     *
     * @return void
     */
    public function testEmptyLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->press('Login')
                ->assertPathIs('/login');
        });
    }

    /**
     * A test for a login with incorrect details
     *
     * @return void
     */
    public function testInvalidLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'ascottp@yahoo.co.uk')
                ->type('password', 'wrongpassword')
                ->press('Login')
                ->assertPathIs('/login');
        });
    }


    /**
     * A test for an admin login with correct details
     *
     * @return void
     */
    public function testValidAdminLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'ascottp@yahoo.co.uk')
                ->type('password', 'Password123')
                ->press('Login')
                ->assertPathIs('/admin/casinos');
        });
    }

}
