<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\SQLiteConnection;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    protected $db;
    
    /**
     * A basic browser test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testBasicExample()
    {
        /* @var $db Connection */
        $this->db = \DB::connection();

        $this->browse(function (Browser $browser) {
            $page = 1;
            $per_page = 100;
            $total_pages = 128;

            $base = 'https://northmetrochurch.ccbchurch.com/api';
            $browser
                ->visit('https://northmetrochurch.ccbchurch.com/goto/login')
                ->type('[data-test=username]', env('CCB_USER'))
                ->type('[data-test=password]', env('CCB_PASS'))
                ->click('[data-test=Button-login]')
                ->waitForLocation('/index.php');

            //$db->table('')->delete();

            $this->db->table('individuals')->delete();

            while ($page <= $total_pages) {
                $browser
                    ->visit($url = "$base/individuals?page=$page&per_page=$per_page")
                    ->whenAvailable('pre', function(Browser $el) use ($browser, $url, $per_page, $page) {
                        $json = $browser->resolver->findOrFail('pre')->getText();
                        $this->db->table('individuals')->insert([
                            'url' => $url,
                            'per_page' => $per_page,
                            'page' => $page,
                            'data' => $json,
                            'created_at' => new Carbon,
                            'updated_at' => new Carbon,
                        ]);
                    })
                ;
                ++$page;
            }

            $browser->driver->executeScript('return console.log("test", {data:[{id:1, name:"daniel"}]});');

            $browser->storeConsoleLog('individuals');
        });
    }
}
