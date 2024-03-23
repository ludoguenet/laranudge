<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NudgesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('nudges')->delete();

        DB::table('nudges')->insert([
            0 => [
                'id' => 2,
                'content' => 'The toBeFinal() method may be used to ensure that all classes within a given namespace are final.',
                'code' => 'arch(\'app\')
->expect(\'App\\ValueObjects\')
->toBeFinal();',
                'validated' => 1,
                'user_id' => 1,
                'created_at' => '2024-02-29 23:00:35',
                'updated_at' => '2024-03-08 15:59:13',
                'title' => 'toBeFinal()',
                'slug' => 'tobefinal',
            ],
            1 => [
                'id' => 3,
                'content' => 'Use whereRelation to easily request information about the relationship between models.',
                'code' => 'User::whereRelation(\'posts\', \'published\', true)->get()


User::whereHas(\'posts\', function($query){
$query->where(\'published\', true)
})->get()',
                'validated' => 1,
                'user_id' => 12,
                'created_at' => '2024-03-01 10:23:14',
                'updated_at' => '2024-03-08 16:03:08',
                'title' => 'whereRelation in Laravel',
                'slug' => 'whererelation-in-laravel',
            ],
            2 => [
                'id' => 4,
                'content' => 'Keep your query strings values during navigation',
                'code' => '$posts = Post::paginate(9)->withQueryString();',
                'validated' => 1,
                'user_id' => 14,
                'created_at' => '2024-03-01 10:37:14',
                'updated_at' => '2024-03-08 16:03:58',
                'title' => 'withQueryString method',
                'slug' => 'withquerystring-method',
            ],
            3 => [
                'id' => 5,
                'content' => 'You can use "now()" helper to get the current time',
                'code' => 'Carbon::now(); // returns the current time
now(); // also returns the current time , but it is a helper function',
                'validated' => 1,
                'user_id' => 19,
                'created_at' => '2024-03-01 13:55:54',
                'updated_at' => '2024-03-08 16:04:08',
                'title' => 'helper now to get current time',
                'slug' => 'helper-now-to-get-current-time',
            ],
            4 => [
                'id' => 6,
                'content' => 'you can use "info()" helper to create a log info',
                'code' => 'Log::info(\'message\'); // logs a message to the default log file
info(\'message\'); // also logs a message to the default log file, but it is a helper function',
                'validated' => 1,
                'user_id' => 19,
                'created_at' => '2024-03-01 13:57:28',
                'updated_at' => '2024-03-08 16:04:17',
                'title' => 'info helper',
                'slug' => 'info-helper',
            ],
            5 => [
                'id' => 7,
                'content' => 'Give your Ide/editor relief on auto completion 🙌',
                'code' => '// Dont do this
User::active()->paginate(10);

// Do this 
User::query()
->active()
->paginate(10);',
                'validated' => 1,
                'user_id' => 22,
                'created_at' => '2024-03-01 15:44:08',
                'updated_at' => '2024-03-08 16:08:57',
                'title' => 'Query() to get auto completion',
                'slug' => 'query-to-get-auto-completion',
            ],
            6 => [
                'id' => 8,
                'content' => 'Use conditional validation rules for greater flexibility in your forms',
                'code' => '$request->validate([
\'email\' => \'required|email\',
\'password\' => [\'required\', Rule::when($someCondition, [\'min:8\'])],
]);',
                'validated' => 1,
                'user_id' => 17,
                'created_at' => '2024-03-02 14:01:15',
                'updated_at' => '2024-03-08 16:08:45',
                'title' => 'Conditional validation',
                'slug' => 'conditional-validation',
            ],
            7 => [
                'id' => 9,
                'content' => 'Throws an HTTP exception',
                'code' => 'abort(404); // throws an 404 exception
abort_if($user->postCount() == 0, 404); // throws an 404 exception if condition
abort_unless($user->isAdmin(), 404); // throws an 404 exception if negation condition',
                'validated' => 1,
                'user_id' => 35,
                'created_at' => '2024-03-02 14:19:15',
                'updated_at' => '2024-03-08 16:08:36',
                'title' => 'Exceptions',
                'slug' => 'exceptions',
            ],
            8 => [
                'id' => 11,
                'content' => 'You can do automatic dependency injections with Laravel service container on a method of a class.',
                'code' => 'class ClassName 
{
public function methodName(ServiceDependency $service)
{
//
}
}

// instead of this
(new ClassName())->methodName(app(ServiceDependency::class));

// you can do this
app()->call([new ClassName(), \'methodName\']);',
                'validated' => 1,
                'user_id' => 41,
                'created_at' => '2024-03-02 20:05:46',
                'updated_at' => '2024-03-08 16:08:24',
                'title' => 'Automatic dependency injections',
                'slug' => 'automatic-dependency-injections',
            ],
            9 => [
                'id' => 12,
                'content' => 'Use clone method to avoid original query modification',
                'code' => '$originalQuery = Book::where(\'genre\', \'fiction\')->orderBy(\'published_at\', \'desc\');
$clonedQuery = $originalQuery->clone();

$clonedQuery->where(\'author\', \'John Doe\');

$originalResults = $originalQuery->get();
$clonedResults = $clonedQuery->get();

//In this example, we create a clone of the original query, modify the cloned query, and then retrieve results independently from both queries.',
                'validated' => 1,
                'user_id' => 45,
                'created_at' => '2024-03-03 01:12:14',
                'updated_at' => '2024-03-08 16:07:55',
                'title' => 'Clone method',
                'slug' => 'clone-method',
            ],
            10 => [
                'id' => 13,
                'content' => 'Use Null Coalescing Assignment Operator 💪',
                'code' => '// The following lines are doing the same 
$request->data[\'comments\'][\'user_id\'] = $request->data[\'comments\'][\'user_id\'] ?? \'value\';
// Instead of repeating variables with long names, the equal coalesce operator is used
$request->data[\'comments\'][\'user_id\'] ??= \'value\';',
                'validated' => 1,
                'user_id' => 22,
                'created_at' => '2024-03-03 07:04:25',
                'updated_at' => '2024-03-08 16:07:43',
                'title' => 'Null Coalescing Assignment Operator',
                'slug' => 'null-coalescing-assignment-operator',
            ],
            11 => [
                'id' => 14,
                'content' => 'Use the updateOrCreate method to find a Model matching the constraints passed as the first parameter. If a matching Model is found, it will update the match with the attributes passed as the second parameter, else a new Model will be created with both the constraints passed as the first parameter and the attributes passed as the second parameter.',
                'code' => '// Instead this :
$user = User::where(\'email\', request(\'email\'))->first();

if ($user !== null) {
$user->update([\'name\' => request(\'name\')]);
} else {
$user = User::create([
\'email\' => request(\'email\'),
\'name\' => request(\'name\'),
]);
}


// Do this :
$user = User::updateOrCreate(
[\'email\' =>  request(\'email\')],
[\'name\' => request(\'name\')]
);',
                'validated' => 1,
                'user_id' => 54,
                'created_at' => '2024-03-03 13:30:59',
                'updated_at' => '2024-03-08 16:05:01',
                'title' => 'updateOrCreate method',
                'slug' => 'updateorcreate-method',
            ],
            12 => [
                'id' => 15,
                'content' => 'Use date method on request to retrieve date field.',
                'code' => '$endDate = request()->date(\'started_at\')->addDays(3);

//You can use Carbon methods on the date.',
                'validated' => 1,
                'user_id' => 45,
                'created_at' => '2024-03-03 19:40:27',
                'updated_at' => '2024-03-08 16:04:53',
                'title' => 'date method on request',
                'slug' => 'date-method-on-request',
            ],
            13 => [
                'id' => 16,
                'content' => 'Retrieve specific columns when eager loading.',
                'code' => '// For BelongsTo relationship
// Don\'t forget to include primary key, here \'id\'
$booksWithAuthorNames = Book::with(\'author:id,name\')->get();

// For HasMany relationship
// Don\'t forget to include foreign key, here \'book_id\' 
$booksWithStockQuantities = Book::with(\'stock:id, book_id, quantity\')->get();',
                'validated' => 1,
                'user_id' => 45,
                'created_at' => '2024-03-04 16:51:25',
                'updated_at' => '2024-03-08 16:04:41',
                'title' => 'Specific columns on eager loading',
                'slug' => 'specific-columns-on-eager-loading',
            ],
            14 => [
                'id' => 17,
                'content' => 'Use the `pluck` method on a Query\\Builder instance to retrieve a collection of values from a given column.',
                'code' => '$books = Book::pluck(\'title\');
// Get a collection of book titles',
                'validated' => 1,
                'user_id' => 45,
                'created_at' => '2024-03-05 15:47:06',
                'updated_at' => '2024-03-08 16:04:28',
                'title' => 'pluck method on querybuilder instance',
                'slug' => 'pluck-method-on-querybuilder-instance',
            ],
            15 => [
                'id' => 18,
                'content' => 'Customize the mail message for the default verify email notification',
                'code' => '// Add this to your AppServiceProvider
VerifyEmail::$toMailCallback = fn ($notifiable, $url) => (new MailMessage())
->subject(\'Verify you email\')
->action(\'Verify HERE!\', $url);',
                'validated' => 1,
                'user_id' => 60,
                'created_at' => '2024-03-05 23:13:44',
                'updated_at' => '2024-03-08 16:03:29',
                'title' => 'Customize mail message for default verify email notification',
                'slug' => 'customize-mail-message-for-default-verify-email-notification',
            ],
            16 => [
                'id' => 20,
                'content' => 'Use rebinding events to refresh dependencies 🚀',
                'code' => '<?php

namespace App\\Providers;

use App\\Services\\PaymentService;
use Illuminate\\Support\\ServiceProvider;
use Illuminate\\Contracts\\Foundation\\Application;

class AppServiceProvider extends ServiceProvider
{
public function register(): void
{
$this->app->singleton(\'payment.service\', function (Application $app) {
$paymentService = new PaymentService();

$paymentService->setTaxService($app[\'tax.service\']);

// Will set a new TaxService instance for the Payment Service
$app->refresh(\'tax.service\', $paymentService, \'setTaxService\');

return $paymentService;
});
}
}',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-06 14:16:42',
                'updated_at' => '2024-03-08 16:02:37',
                'title' => 'Rebinding events to refresh dependencies',
                'slug' => 'rebinding-events-to-refresh-dependencies',
            ],
            17 => [
                'id' => 21,
                'content' => 'Route Absolute and Relative Path 🚀',
                'code' => 'route(\'tips\', $tip->id); // https://oussama-mater.tech/tips/1

route(\'tips\', $tip->id, false); // /tips/1',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-06 14:17:18',
                'updated_at' => '2024-03-08 16:02:26',
                'title' => 'Absolute and relative path',
                'slug' => 'absolute-and-relative-path',
            ],
            18 => [
                'id' => 22,
                'content' => 'Dynamic Wheres 🚀',
                'code' => '// select * from `users` where `name` = \'oussama\' and `last_name` = \'mater\'"
User::whereNameAndLastName(\'oussama\', \'mater\')->first();',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-06 14:18:30',
                'updated_at' => '2024-03-08 16:02:13',
                'title' => 'Dynamic wheres',
                'slug' => 'dynamic-wheres',
            ],
            19 => [
                'id' => 23,
                'content' => 'Quietly update your models 🚀',
                'code' => '$user = Auth::user();

$user->name = \'Oussama Mater\';

// Won\'t trigger Model Events
$user->saveQuietly();
$user->deleteQuietly();
$user->forceDeleteQuietly();
$user->restoreQuietly();',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-06 14:19:07',
                'updated_at' => '2024-03-08 16:02:04',
                'title' => 'Quitely update models',
                'slug' => 'quitely-update-models',
            ],
            20 => [
                'id' => 24,
                'content' => 'Filter out records that have a given amount of children records from a HasMany relationship.',
                'code' => '$posts = Post::has(\'comments\', \'>\', 10)->get();',
                'validated' => 1,
                'user_id' => 45,
                'created_at' => '2024-03-06 16:52:38',
                'updated_at' => '2024-03-08 16:01:44',
                'title' => 'Has method',
                'slug' => 'has-method',
            ],
            21 => [
                'id' => 26,
                'content' => 'Use the "is()" & "isNot()" methods in Laravel',
                'code' => '$user = User::find(1);  
$sameUser = User::find(1);  
$differentUser = User::find(2);

$user->is($sameUser); // true  
$user->is($differentUser); // false

$user->isNot($sameUser); // false
$user->isNot($differentUser); // true',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-07 08:56:28',
                'updated_at' => '2024-03-08 16:00:57',
                'title' => 'Is() and IsNot()',
                'slug' => 'is-and-isnot',
            ],
            22 => [
                'id' => 27,
                'content' => 'A shorter "whereHas"',
                'code' => '// Instead of this 😐
User::whereHas(\'comments\', function ($query) {
$query->where(\'created_at\', \'>\', now()->subDay());
})->get();

// You can do this 😎
User::whereRelation(\'comments\', \'created_at\', \'>\', now()->subDay())->get();',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-07 08:57:25',
                'updated_at' => '2024-03-08 16:00:47',
                'title' => 'Shorter wherehas',
                'slug' => 'shorter-wherehas',
            ],
            23 => [
                'id' => 28,
                'content' => 'Dispatch After Response 🚀',
                'code' => 'use App\\Jobs\\SendNotification;

// This will be dispatched just after the response, no workers are needed.
SendNotification::dispatchAfterResponse();',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-07 08:58:17',
                'updated_at' => '2024-03-08 16:00:36',
                'title' => 'Dispatch after response',
                'slug' => 'dispatch-after-response',
            ],
            24 => [
                'id' => 29,
                'content' => 'Command Input Auto-Completion 🚀',
                'code' => '<?php

// You can use arrays 
$animal = $this->anticipate("What\'s your favorite animal?", [\'dogs\', \'cats\']);

// Or run a closure, triggered every time a user types a character
$animal = $this->anticipate("What\'s your favorite animal?", function (string $input) {
return Animal::query()
->where(\'name\', \'LIKE\', "$input%")
->pluck(\'name\')
->toArray();
});',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-07 17:15:43',
                'updated_at' => '2024-03-08 16:00:26',
                'title' => 'Auto-completion',
                'slug' => 'auto-completion',
            ],
            25 => [
                'id' => 30,
                'content' => 'Authorize resource controllers in one line!',
                'code' => '// Instead of doing $this->authorize() on each controller action, do this:
public function __construct()
{
$this->authorizeResource(User::class, \'user\');
}',
                'validated' => 1,
                'user_id' => 60,
                'created_at' => '2024-03-07 19:43:22',
                'updated_at' => '2024-03-08 16:00:16',
                'title' => 'Resource Controllers',
                'slug' => 'resource-controllers',
            ],
            26 => [
                'id' => 31,
                'content' => 'Sometime you may need to apply the same query constraints to multiple columns. For example, you may want to retreive all records where any columns in a given list are LIKE a given value. You may accomplish the using the whereAny method.',
                'code' => '// where any.
$users = DB::table(\'users\')
->where(\'active\', true)
->whereAny([
\'username\',
\'email\',
\'phone\'
], \'LIKE\', \'example%\');

// where all.
$users = DB::table(\'posts\')
->where(\'published\', true)
->whereAll([
\'title\',
\'content\'
], \'LIKE\', \'%Laravel%\');',
                'validated' => 1,
                'user_id' => 58,
                'created_at' => '2024-03-08 03:23:03',
                'updated_at' => '2024-03-08 15:59:45',
                'title' => 'WhereAny and WhereAll',
                'slug' => 'whereany-and-whereall',
            ],
            27 => [
                'id' => 32,
                'content' => 'smtp driver -> log',
                'code' => '#MAIL_MAILER=smtp
#to view mail content in log files
MAIL_MAILER=log',
                'validated' => 1,
                'user_id' => 33,
                'created_at' => '2024-03-08 14:10:28',
                'updated_at' => '2024-03-08 15:59:26',
                'title' => 'SMTP driver',
                'slug' => 'smtp-driver',
            ],
            28 => [
                'id' => 33,
                'content' => 'When a **closure** is passed to this method, Laravel will attempt to acquire the lock for the specified number of seconds and will automatically release the lock once the closure has been executed:

[Learn more](https://laravel.com/docs/10.x/cache#managing-locks).',
                'code' => 'Cache::lock(\'foo\', 10)->block(5, function () {
// Lock acquired after waiting a maximum of 5 seconds...
});',
                'validated' => 1,
                'user_id' => 1,
                'created_at' => '2024-03-08 17:02:14',
                'updated_at' => '2024-03-10 15:56:53',
                'title' => 'Managing Locks 🔒',
                'slug' => 'managing-locks',
            ],
            29 => [
                'id' => 34,
                'content' => 'Sometimes you may need to eager load several different relationships. To do so, just pass an array of relationships to the with method:',
                'code' => 'Association::query()->with([\'department\', \'categories\'])->get();',
                'validated' => 1,
                'user_id' => 75,
                'created_at' => '2024-03-09 20:07:51',
                'updated_at' => '2024-03-09 20:16:03',
                'title' => 'Eager Loading Multiple Relationships',
                'slug' => 'eager-loading-multiple-relationships',
            ],
            30 => [
                'id' => 35,
                'content' => 'Would you like to view SQL queries executed by Eloquent ?

Use ```toSql()``` and ```toRawSql()``` methods to take a closer look !',
                'code' => '$user = User::whereId(42);

$user->toSql(); // "select * from `users` where `id` = ?"

$user->toRawSql(); // "select * from `users` where `id` = 42"',
                'validated' => 1,
                'user_id' => 54,
                'created_at' => '2024-03-09 20:15:36',
                'updated_at' => '2024-03-10 15:39:46',
                'title' => 'View SQL queries executed by Eloquent',
                'slug' => 'view-sql-queries-executed-by-eloquent',
            ],
            31 => [
                'id' => 36,
                'content' => 'You can get the first element with **first()** method directly on your model instead of doing it on the collection. It\'s faster',
                'code' => '// Instead of this
Post::all()->first();

// Do this
Post::first();',
                'validated' => 1,
                'user_id' => 80,
                'created_at' => '2024-03-10 21:13:14',
                'updated_at' => '2024-03-10 22:47:09',
                'title' => 'Get First Element',
                'slug' => 'get-first-element',
            ],
            32 => [
                'id' => 39,
                'content' => 'The use of local query scopes approach in Laravel',
                'code' => '// First approach
$borrowers = User::where(\'status\',true)->where(\'acc_type\',\'employee\')->get();

//Use query scopes approach

// in your User model
public function scopeActive($query)
{
return $query->where(\'status\',true);
}

public function scopeEmployee($query)
{
return $query->where(\'acc_type\',\'employee\');
}

//in your controller
$borrower = User::active()->employee()->get();',
                'validated' => 1,
                'user_id' => 61,
                'created_at' => '2024-03-11 16:17:55',
                'updated_at' => '2024-03-11 16:52:01',
                'title' => 'Local query scopes approach',
                'slug' => 'local-query-scopes-approach',
            ],
            33 => [
                'id' => 40,
                'content' => 'How to redirect to a named route easily ?',
                'code' => '// old way to redirect to a named route
return redirect()->route("posts.index")

// easier way to redirect to a named route
return to_route("posts.index")',
                'validated' => 1,
                'user_id' => 32,
                'created_at' => '2024-03-13 08:41:18',
                'updated_at' => '2024-03-13 13:28:53',
                'title' => 'Redirect to a named route',
                'slug' => 'redirect-to-a-named-route',
            ],
            34 => [
                'id' => 41,
                'content' => 'To redirect any wrong route to another correct route.',
                'code' => 'use Illuminate\\Support\\Facades\\Route;


Route::get( \'foo\', [ FooController::class, \'bar\' ] )->name( \'foo\' );


Route::get( \'{any}\', fn() => redirect()->route( \'foo\' ) )->where( \'any\', \'.*\' ); // usable multiple times, inside domains for example.

Route::fallback( fn() => redirect()->route( \'foo\' ) ); // usable once',
                'validated' => 1,
                'user_id' => 93,
                'created_at' => '2024-03-14 10:07:06',
                'updated_at' => '2024-03-14 11:26:01',
                'title' => 'Redirect if not found ! Avoid 404 page',
                'slug' => 'redirect-if-not-found-avoid-404-page',
            ],
            35 => [
                'id' => 42,
                'content' => 'A simple and fast way to calculate the reading time of an HTML-formatted article. On average, it takes 240 words per minute.',
                'code' => 'use Illuminate/Support/Str;

$readTime = round( Str::wordCount( strip_tags( $html ) ) / 240 );',
                'validated' => 1,
                'user_id' => 93,
                'created_at' => '2024-03-14 10:09:07',
                'updated_at' => '2024-03-14 11:26:01',
                'title' => 'Reading Time !',
                'slug' => 'reading-time',
            ],
            36 => [
                'id' => 43,
                'content' => 'How to create a folder in a specific directory with its \'.gitignore\' file.',
                'code' => 'use Illuminate\\Support\\Facades\\File;

$path = "storage/foo";

if( ! File::exists( $path ) )
{
File::makeDirectory( $path );

File::put( "{$path}/.gitignore", "*\\n!.gitignore" );
}',
                'validated' => 1,
                'user_id' => 93,
                'created_at' => '2024-03-14 10:15:00',
                'updated_at' => '2024-03-14 11:26:02',
                'title' => 'Create a directory with its gitignore file !',
                'slug' => 'create-a-directory-with-its-gitignore-file',
            ],
            37 => [
                'id' => 44,
                'content' => 'Use withAggregate to add a relationships\' field to the result.',
                'code' => 'User::query()
->withAggregate(\'country\', \'name\')
->orderBy(\'country_name\');',
                'validated' => 1,
                'user_id' => 96,
                'created_at' => '2024-03-15 08:52:56',
                'updated_at' => '2024-03-15 09:25:51',
                'title' => 'Order an eloquent query based on a field of a relation',
                'slug' => 'order-an-eloquent-query-based-on-a-field-of-a-relation',
            ],
            38 => [
                'id' => 45,
                'content' => 'Need to know if a request hits a specific named route? Laravel\'s `named()` method on routes makes it simple!',
                'code' => 'if ($request->route()->named(\'profile\')) {
// ...
}

// or using the request() helper
if (request()->route()->named(\'profile\')) {
// ...
}',
                'validated' => 1,
                'user_id' => 100,
                'created_at' => '2024-03-16 09:41:31',
                'updated_at' => '2024-03-16 11:24:51',
                'title' => 'Inspecting the Current Route',
                'slug' => 'inspecting-the-current-route',
            ],
            39 => [
                'id' => 46,
                'content' => 'Learn how to improve code clarity and maintainability in Laravel applications by leveraging enumerations for model attributes. 

This tip demonstrates how using enums centralizes logic, ensures type consistency, and enhances readability, ultimately leading to more robust and manageable code.',
                'code' => '// Before
$label = $post->status == 0 ? \'Draft\' 
: ($post->status == 1 ? \'Reviewing\' 
: ($post->status == 2 ? \'Published\'  
: \'Rejected\' ))

// After 
$label = $post->status->label();

// create post enum
enum PostStatus: int
{
case Draft = 0;
case Reviewing = 1;
case Published = 2;
case Rejected = 3;

public function label(): ?string
{
return $this->name;

// or
return str($this->name)->title();  
// or any method that satisfies your case

// or
return match ($this) {
self::Draft => \'Draft\',
self::Reviewing => \'Reviewing\',
self::Published => \'Published\',
self::Rejected => \'Rejected\',
};
}
}

// cast the enum in model
class Post extends Model 
{

// Laravel 11 
protected function casts(): array
{
return [
\'status\' => PostStatus::class,
];
}

// Laravel 10
protected $casts = [
\'status\' => PostStatus::class,
];
}

// And all set',
                'validated' => 1,
                'user_id' => 22,
                'created_at' => '2024-03-16 09:45:57',
                'updated_at' => '2024-03-16 11:24:52',
                'title' => 'Enhance Readability and Maintainability with Enumerations for Model Attributes in Laravel',
                'slug' => 'enhance-readability-and-maintainability-with-enumerations-for-model-attributes-in-laravel',
            ],
            40 => [
                'id' => 47,
                'content' => 'Did you know that Laravel provides the `missing()` method to customize the default route model binding behavior when a model is not found? 🚀',
                'code' => 'use App\\Http\\Controllers\\LocationsController;
use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\Redirect;

Route::get(\'/locations/{location:slug}\', [LocationsController::class, \'show\'])
->name(\'locations.view\')
->missing(function (Request $request) {
return Redirect::route(\'locations.index\');
});',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-16 12:29:27',
                'updated_at' => '2024-03-16 14:02:02',
                'title' => 'Customize Missing Model Behavior',
                'slug' => 'customize-missing-model-behavior',
            ],
            41 => [
                'id' => 48,
                'content' => 'Did you know that the Laravel HTTP Client comes with a fluent method called `withToken()` that you can use to set bearer tokens? 🚀',
                'code' => '// The following code 😑
Http::withHeaders([
\'Authorization\' => \'Bearer eyJhbGciOiJIUz...\',
]);

// Is equivalent to this 😎
Http::withToken(\'eyJhbGciOiJIUz...\');',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-16 12:30:22',
                'updated_at' => '2024-03-16 14:02:03',
                'title' => 'The "withToken()" method',
                'slug' => 'the-withtoken-method',
            ],
            42 => [
                'id' => 49,
                'content' => 'Did you know that Laravel allows you to define callbacks to be executed based on the result of a scheduled task? This helps log failures or execute related actions on success 🚀',
                'code' => '$schedule->command(\'emails:send\')
->daily()
->onSuccess(function () {
// The task succeeded...
})
->onFailure(function () {
// The task failed...
});',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-16 12:31:08',
                'updated_at' => '2024-03-16 14:02:04',
                'title' => 'On Command Result',
                'slug' => 'on-command-result',
            ],
            43 => [
                'id' => 50,
                'content' => 'When building console commands, you can improve the user experience by implementing auto-completion for the user. This can be done using the `anticipate()` method provided by Laravel 🚀',
                'code' => '// You can use arrays 
$animal = $this->anticipate("What\'s your favourite animal?", [\'dogs\', \'cats\']);

// Or run a closure, triggered every time a user types a character
$animal = $this->anticipate("What\'s your favourite animal?", function (string $input) {
return Animal::query()
->where(\'name\', \'LIKE\', "$input%")
->pluck(\'name\')
->toArray();
});',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-16 12:32:09',
                'updated_at' => '2024-03-16 14:02:05',
                'title' => 'Command Input Auto-Completion',
                'slug' => 'command-input-auto-completion',
            ],
            44 => [
                'id' => 51,
                'content' => 'You can chain commands in your scheduler using the `then()` method, an undocumented feature that I often find myself using 🚀',
                'code' => '$schedule->command(\'db:backup\')
->daily()
->then(function () {
$this->command(\'notify:slack\');
});',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-16 12:32:58',
                'updated_at' => '2024-03-16 14:02:05',
                'title' => 'Chain Scheduled Commands',
                'slug' => 'chain-scheduled-commands',
            ],
            45 => [
                'id' => 52,
                'content' => 'Route Model Binding allows you to inject the model instances directly into your routes. It is usually used within a controller, but did you know you could also access the model instance in your Form Request? 🚀',
                'code' => '// Route definition
Route::put(\'/post/{post}\', [PostsController::class, \'create\']);


// Form Request defintion
class PostController extends FormRequest
{
public function authorize(): bool
{
// The post instance, if found
return $this->user()->can(\'create\', $this->route(\'post\'));
}

public function rules(): array
{
return [
// ...
];
}
}',
                'validated' => 1,
                'user_id' => 63,
                'created_at' => '2024-03-16 12:34:21',
                'updated_at' => '2024-03-16 14:02:06',
                'title' => 'Model Binding in Form Requests',
                'slug' => 'model-binding-in-form-requests',
            ],
        ]);

    }
}
