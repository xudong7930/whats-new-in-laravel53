<?php

use Illuminate\Foundation\Inspiring;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

// try in terminal: php artisan inspire
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('generate:model {name}', function () {
    $model = $this->argument('name');
    $phpClass = <<<EOF
<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class {$model} extends Model
{

}

EOF;
    File::put('app/'.$model.'.php', $phpClass);
    $this->info('All done!');

    // exec('touch app/' . $this->argument('name') . ".php");
})->describe('Generate a special command');
