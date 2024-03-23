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
        
        DB::table('nudges')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
            'content' => 'The toBeFinal() method may be used to ensure that all classes within a given namespace are final.',
            'code' => 'arch(\'app\')
->expect(\'App\\ValueObjects\')
->toBeFinal();',
                'created_at' => '2024-02-29 23:00:35',
                'updated_at' => '2024-03-08 15:59:13',
            'title' => 'toBeFinal()',
                'slug' => 'tobefinal',
                'status' => 'validated',
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 12,
                'content' => 'Use whereRelation to easily request information about the relationship between models.',
            'code' => 'User::whereRelation(\'posts\', \'published\', true)->get()


User::whereHas(\'posts\', function($query){
$query->where(\'published\', true)
})->get()',
                'created_at' => '2024-03-01 10:23:14',
                'updated_at' => '2024-03-08 16:03:08',
                'title' => 'whereRelation in Laravel',
                'slug' => 'whererelation-in-laravel',
                'status' => 'validated',
            ),
            2 => 
            array (
                'id' => 4,
                'user_id' => 14,
                'content' => 'Keep your query strings values during navigation',
            'code' => '$posts = Post::paginate(9)->withQueryString();',
                'created_at' => '2024-03-01 10:37:14',
                'updated_at' => '2024-03-08 16:03:58',
                'title' => 'withQueryString method',
                'slug' => 'withquerystring-method',
                'status' => 'validated',
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 19,
            'content' => 'You can use "now()" helper to get the current time',
            'code' => 'Carbon::now(); // returns the current time
now(); // also returns the current time , but it is a helper function',
                'created_at' => '2024-03-01 13:55:54',
                'updated_at' => '2024-03-08 16:04:08',
                'title' => 'helper now to get current time',
                'slug' => 'helper-now-to-get-current-time',
                'status' => 'validated',
            ),
            4 => 
            array (
                'id' => 6,
                'user_id' => 19,
            'content' => 'you can use "info()" helper to create a log info',
            'code' => 'Log::info(\'message\'); // logs a message to the default log file
info(\'message\'); // also logs a message to the default log file, but it is a helper function',
                'created_at' => '2024-03-01 13:57:28',
                'updated_at' => '2024-03-08 16:04:17',
                'title' => 'info helper',
                'slug' => 'info-helper',
                'status' => 'validated',
            ),
            5 => 
            array (
                'id' => 7,
                'user_id' => 22,
                'content' => 'Give your Ide/editor relief on auto completion 🙌',
                'code' => '// Dont do this
User::active()->paginate(10);

// Do this 
User::query()
->active()
->paginate(10);',
                'created_at' => '2024-03-01 15:44:08',
                'updated_at' => '2024-03-08 16:08:57',
            'title' => 'Query() to get auto completion',
                'slug' => 'query-to-get-auto-completion',
                'status' => 'validated',
            ),
            6 => 
            array (
                'id' => 8,
                'user_id' => 17,
                'content' => 'Use conditional validation rules for greater flexibility in your forms',
                'code' => '$request->validate([
\'email\' => \'required|email\',
\'password\' => [\'required\', Rule::when($someCondition, [\'min:8\'])],
]);',
                'created_at' => '2024-03-02 14:01:15',
                'updated_at' => '2024-03-08 16:08:45',
                'title' => 'Conditional validation',
                'slug' => 'conditional-validation',
                'status' => 'validated',
            ),
            7 => 
            array (
                'id' => 9,
                'user_id' => 35,
                'content' => 'Throws an HTTP exception',
            'code' => 'abort(404); // throws an 404 exception
abort_if($user->postCount() == 0, 404); // throws an 404 exception if condition
abort_unless($user->isAdmin(), 404); // throws an 404 exception if negation condition',
                'created_at' => '2024-03-02 14:19:15',
                'updated_at' => '2024-03-08 16:08:36',
                'title' => 'Exceptions',
                'slug' => 'exceptions',
                'status' => 'validated',
            ),
            8 => 
            array (
                'id' => 11,
                'user_id' => 41,
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
                'created_at' => '2024-03-02 20:05:46',
                'updated_at' => '2024-03-08 16:08:24',
                'title' => 'Automatic dependency injections',
                'slug' => 'automatic-dependency-injections',
                'status' => 'validated',
            ),
            9 => 
            array (
                'id' => 12,
                'user_id' => 45,
                'content' => 'Use clone method to avoid original query modification',
            'code' => '$originalQuery = Book::where(\'genre\', \'fiction\')->orderBy(\'published_at\', \'desc\');
$clonedQuery = $originalQuery->clone();

$clonedQuery->where(\'author\', \'John Doe\');

$originalResults = $originalQuery->get();
$clonedResults = $clonedQuery->get();

//In this example, we create a clone of the original query, modify the cloned query, and then retrieve results independently from both queries.',
                'created_at' => '2024-03-03 01:12:14',
                'updated_at' => '2024-03-08 16:07:55',
                'title' => 'Clone method',
                'slug' => 'clone-method',
                'status' => 'validated',
            ),
            10 => 
            array (
                'id' => 13,
                'user_id' => 22,
                'content' => 'Use Null Coalescing Assignment Operator 💪',
                'code' => '// The following lines are doing the same 
$request->data[\'comments\'][\'user_id\'] = $request->data[\'comments\'][\'user_id\'] ?? \'value\';
// Instead of repeating variables with long names, the equal coalesce operator is used
$request->data[\'comments\'][\'user_id\'] ??= \'value\';',
                'created_at' => '2024-03-03 07:04:25',
                'updated_at' => '2024-03-08 16:07:43',
                'title' => 'Null Coalescing Assignment Operator',
                'slug' => 'null-coalescing-assignment-operator',
                'status' => 'validated',
            ),
            11 => 
            array (
                'id' => 14,
                'user_id' => 54,
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
                'created_at' => '2024-03-03 13:30:59',
                'updated_at' => '2024-03-08 16:05:01',
                'title' => 'updateOrCreate method',
                'slug' => 'updateorcreate-method',
                'status' => 'validated',
            ),
            12 => 
            array (
                'id' => 15,
                'user_id' => 45,
                'content' => 'Use date method on request to retrieve date field.',
            'code' => '$endDate = request()->date(\'started_at\')->addDays(3);

//You can use Carbon methods on the date.',
                'created_at' => '2024-03-03 19:40:27',
                'updated_at' => '2024-03-08 16:04:53',
                'title' => 'date method on request',
                'slug' => 'date-method-on-request',
                'status' => 'validated',
            ),
            13 => 
            array (
                'id' => 16,
                'user_id' => 45,
                'content' => 'Retrieve specific columns when eager loading.',
                'code' => '// For BelongsTo relationship
// Don\'t forget to include primary key, here \'id\'
$booksWithAuthorNames = Book::with(\'author:id,name\')->get();

// For HasMany relationship
// Don\'t forget to include foreign key, here \'book_id\' 
$booksWithStockQuantities = Book::with(\'stock:id, book_id, quantity\')->get();',
                'created_at' => '2024-03-04 16:51:25',
                'updated_at' => '2024-03-08 16:04:41',
                'title' => 'Specific columns on eager loading',
                'slug' => 'specific-columns-on-eager-loading',
                'status' => 'validated',
            ),
            14 => 
            array (
                'id' => 17,
                'user_id' => 45,
                'content' => 'Use the `pluck` method on a Query\\Builder instance to retrieve a collection of values from a given column.',
            'code' => '$books = Book::pluck(\'title\');
// Get a collection of book titles',
                'created_at' => '2024-03-05 15:47:06',
                'updated_at' => '2024-03-08 16:04:28',
                'title' => 'pluck method on querybuilder instance',
                'slug' => 'pluck-method-on-querybuilder-instance',
                'status' => 'validated',
            ),
            15 => 
            array (
                'id' => 18,
                'user_id' => 60,
                'content' => 'Customize the mail message for the default verify email notification',
                'code' => '// Add this to your AppServiceProvider
VerifyEmail::$toMailCallback = fn ($notifiable, $url) => (new MailMessage())
->subject(\'Verify you email\')
->action(\'Verify HERE!\', $url);',
                'created_at' => '2024-03-05 23:13:44',
                'updated_at' => '2024-03-08 16:03:29',
                'title' => 'Customize mail message for default verify email notification',
                'slug' => 'customize-mail-message-for-default-verify-email-notification',
                'status' => 'validated',
            ),
            16 => 
            array (
                'id' => 20,
                'user_id' => 63,
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
            'created_at' => '2024-03-06 14:16:42',
            'updated_at' => '2024-03-08 16:02:37',
            'title' => 'Rebinding events to refresh dependencies',
            'slug' => 'rebinding-events-to-refresh-dependencies',
            'status' => 'validated',
        ),
        17 => 
        array (
            'id' => 21,
            'user_id' => 63,
            'content' => 'Route Absolute and Relative Path 🚀',
        'code' => 'route(\'tips\', $tip->id); // https://oussama-mater.tech/tips/1

route(\'tips\', $tip->id, false); // /tips/1',
            'created_at' => '2024-03-06 14:17:18',
            'updated_at' => '2024-03-08 16:02:26',
            'title' => 'Absolute and relative path',
            'slug' => 'absolute-and-relative-path',
            'status' => 'validated',
        ),
        18 => 
        array (
            'id' => 22,
            'user_id' => 63,
            'content' => 'Dynamic Wheres 🚀',
            'code' => '// select * from `users` where `name` = \'oussama\' and `last_name` = \'mater\'"
User::whereNameAndLastName(\'oussama\', \'mater\')->first();',
            'created_at' => '2024-03-06 14:18:30',
            'updated_at' => '2024-03-08 16:02:13',
            'title' => 'Dynamic wheres',
            'slug' => 'dynamic-wheres',
            'status' => 'validated',
        ),
        19 => 
        array (
            'id' => 23,
            'user_id' => 63,
            'content' => 'Quietly update your models 🚀',
        'code' => '$user = Auth::user();

$user->name = \'Oussama Mater\';

// Won\'t trigger Model Events
$user->saveQuietly();
$user->deleteQuietly();
$user->forceDeleteQuietly();
$user->restoreQuietly();',
            'created_at' => '2024-03-06 14:19:07',
            'updated_at' => '2024-03-08 16:02:04',
            'title' => 'Quitely update models',
            'slug' => 'quitely-update-models',
            'status' => 'validated',
        ),
        20 => 
        array (
            'id' => 24,
            'user_id' => 45,
            'content' => 'Filter out records that have a given amount of children records from a HasMany relationship.',
        'code' => '$posts = Post::has(\'comments\', \'>\', 10)->get();',
            'created_at' => '2024-03-06 16:52:38',
            'updated_at' => '2024-03-08 16:01:44',
            'title' => 'Has method',
            'slug' => 'has-method',
            'status' => 'validated',
        ),
        21 => 
        array (
            'id' => 26,
            'user_id' => 63,
        'content' => 'Use the "is()" & "isNot()" methods in Laravel',
        'code' => '$user = User::find(1);  
$sameUser = User::find(1);  
$differentUser = User::find(2);

$user->is($sameUser); // true  
$user->is($differentUser); // false

$user->isNot($sameUser); // false
$user->isNot($differentUser); // true',
            'created_at' => '2024-03-07 08:56:28',
            'updated_at' => '2024-03-08 16:00:57',
        'title' => 'Is() and IsNot()',
            'slug' => 'is-and-isnot',
            'status' => 'validated',
        ),
        22 => 
        array (
            'id' => 27,
            'user_id' => 63,
            'content' => 'A shorter "whereHas"',
            'code' => '// Instead of this 😐
User::whereHas(\'comments\', function ($query) {
$query->where(\'created_at\', \'>\', now()->subDay());
})->get();

// You can do this 😎
User::whereRelation(\'comments\', \'created_at\', \'>\', now()->subDay())->get();',
            'created_at' => '2024-03-07 08:57:25',
            'updated_at' => '2024-03-08 16:00:47',
            'title' => 'Shorter wherehas',
            'slug' => 'shorter-wherehas',
            'status' => 'validated',
        ),
        23 => 
        array (
            'id' => 28,
            'user_id' => 63,
            'content' => 'Dispatch After Response 🚀',
            'code' => 'use App\\Jobs\\SendNotification;

// This will be dispatched just after the response, no workers are needed.
SendNotification::dispatchAfterResponse();',
            'created_at' => '2024-03-07 08:58:17',
            'updated_at' => '2024-03-08 16:00:36',
            'title' => 'Dispatch after response',
            'slug' => 'dispatch-after-response',
            'status' => 'validated',
        ),
        24 => 
        array (
            'id' => 29,
            'user_id' => 63,
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
        'created_at' => '2024-03-07 17:15:43',
        'updated_at' => '2024-03-08 16:00:26',
        'title' => 'Auto-completion',
        'slug' => 'auto-completion',
        'status' => 'validated',
    ),
    25 => 
    array (
        'id' => 30,
        'user_id' => 60,
        'content' => 'Authorize resource controllers in one line!',
    'code' => '// Instead of doing $this->authorize() on each controller action, do this:
public function __construct()
{
$this->authorizeResource(User::class, \'user\');
}',
        'created_at' => '2024-03-07 19:43:22',
        'updated_at' => '2024-03-08 16:00:16',
        'title' => 'Resource Controllers',
        'slug' => 'resource-controllers',
        'status' => 'validated',
    ),
    26 => 
    array (
        'id' => 31,
        'user_id' => 58,
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
        'created_at' => '2024-03-08 03:23:03',
        'updated_at' => '2024-03-08 15:59:45',
        'title' => 'WhereAny and WhereAll',
        'slug' => 'whereany-and-whereall',
        'status' => 'validated',
    ),
    27 => 
    array (
        'id' => 32,
        'user_id' => 33,
        'content' => 'smtp driver -> log',
        'code' => '#MAIL_MAILER=smtp
#to view mail content in log files
MAIL_MAILER=log',
        'created_at' => '2024-03-08 14:10:28',
        'updated_at' => '2024-03-08 15:59:26',
        'title' => 'SMTP driver',
        'slug' => 'smtp-driver',
        'status' => 'validated',
    ),
    28 => 
    array (
        'id' => 33,
        'user_id' => 1,
        'content' => 'When a **closure** is passed to this method, Laravel will attempt to acquire the lock for the specified number of seconds and will automatically release the lock once the closure has been executed:

[Learn more](https://laravel.com/docs/10.x/cache#managing-locks).',
    'code' => 'Cache::lock(\'foo\', 10)->block(5, function () {
// Lock acquired after waiting a maximum of 5 seconds...
});',
    'created_at' => '2024-03-08 17:02:14',
    'updated_at' => '2024-03-10 15:56:53',
    'title' => 'Managing Locks 🔒',
    'slug' => 'managing-locks',
    'status' => 'validated',
),
29 => 
array (
    'id' => 34,
    'user_id' => 75,
    'content' => 'Sometimes you may need to eager load several different relationships. To do so, just pass an array of relationships to the with method:',
'code' => 'Association::query()->with([\'department\', \'categories\'])->get();',
    'created_at' => '2024-03-09 20:07:51',
    'updated_at' => '2024-03-09 20:16:03',
    'title' => 'Eager Loading Multiple Relationships',
    'slug' => 'eager-loading-multiple-relationships',
    'status' => 'validated',
),
30 => 
array (
    'id' => 35,
    'user_id' => 54,
    'content' => 'Would you like to view SQL queries executed by Eloquent ?

Use ```toSql()``` and ```toRawSql()``` methods to take a closer look !',
'code' => '$user = User::whereId(42);

$user->toSql(); // "select * from `users` where `id` = ?"

$user->toRawSql(); // "select * from `users` where `id` = 42"',
    'created_at' => '2024-03-09 20:15:36',
    'updated_at' => '2024-03-10 15:39:46',
    'title' => 'View SQL queries executed by Eloquent',
    'slug' => 'view-sql-queries-executed-by-eloquent',
    'status' => 'validated',
),
31 => 
array (
    'id' => 36,
    'user_id' => 80,
'content' => 'You can get the first element with **first()** method directly on your model instead of doing it on the collection. It\'s faster',
    'code' => '// Instead of this
Post::all()->first();

// Do this
Post::first();',
    'created_at' => '2024-03-10 21:13:14',
    'updated_at' => '2024-03-10 22:47:09',
    'title' => 'Get First Element',
    'slug' => 'get-first-element',
    'status' => 'validated',
),
32 => 
array (
    'id' => 39,
    'user_id' => 61,
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
    'created_at' => '2024-03-11 16:17:55',
    'updated_at' => '2024-03-11 16:52:01',
    'title' => 'Local query scopes approach',
    'slug' => 'local-query-scopes-approach',
    'status' => 'validated',
),
33 => 
array (
    'id' => 40,
    'user_id' => 32,
    'content' => 'How to redirect to a named route easily ?',
    'code' => '// old way to redirect to a named route
return redirect()->route("posts.index")

// easier way to redirect to a named route
return to_route("posts.index")',
    'created_at' => '2024-03-13 08:41:18',
    'updated_at' => '2024-03-13 13:28:53',
    'title' => 'Redirect to a named route',
    'slug' => 'redirect-to-a-named-route',
    'status' => 'validated',
),
34 => 
array (
    'id' => 41,
    'user_id' => 93,
    'content' => 'To redirect any wrong route to another correct route.',
    'code' => 'use Illuminate\\Support\\Facades\\Route;


Route::get( \'foo\', [ FooController::class, \'bar\' ] )->name( \'foo\' );


Route::get( \'{any}\', fn() => redirect()->route( \'foo\' ) )->where( \'any\', \'.*\' ); // usable multiple times, inside domains for example.

Route::fallback( fn() => redirect()->route( \'foo\' ) ); // usable once',
    'created_at' => '2024-03-14 10:07:06',
    'updated_at' => '2024-03-14 11:26:01',
    'title' => 'Redirect if not found ! Avoid 404 page',
    'slug' => 'redirect-if-not-found-avoid-404-page',
    'status' => 'validated',
),
35 => 
array (
    'id' => 42,
    'user_id' => 93,
    'content' => 'A simple and fast way to calculate the reading time of an HTML-formatted article. On average, it takes 240 words per minute.',
    'code' => 'use Illuminate/Support/Str;

$readTime = round( Str::wordCount( strip_tags( $html ) ) / 240 );',
    'created_at' => '2024-03-14 10:09:07',
    'updated_at' => '2024-03-14 11:26:01',
    'title' => 'Reading Time !',
    'slug' => 'reading-time',
    'status' => 'validated',
),
36 => 
array (
    'id' => 43,
    'user_id' => 93,
    'content' => 'How to create a folder in a specific directory with its \'.gitignore\' file.',
    'code' => 'use Illuminate\\Support\\Facades\\File;

$path = "storage/foo";

if( ! File::exists( $path ) )
{
File::makeDirectory( $path );

File::put( "{$path}/.gitignore", "*\\n!.gitignore" );
}',
    'created_at' => '2024-03-14 10:15:00',
    'updated_at' => '2024-03-14 11:26:02',
    'title' => 'Create a directory with its gitignore file !',
    'slug' => 'create-a-directory-with-its-gitignore-file',
    'status' => 'validated',
),
37 => 
array (
    'id' => 44,
    'user_id' => 96,
    'content' => 'Use withAggregate to add a relationships\' field to the result.',
'code' => 'User::query()
->withAggregate(\'country\', \'name\')
->orderBy(\'country_name\');',
    'created_at' => '2024-03-15 08:52:56',
    'updated_at' => '2024-03-15 09:25:51',
    'title' => 'Order an eloquent query based on a field of a relation',
    'slug' => 'order-an-eloquent-query-based-on-a-field-of-a-relation',
    'status' => 'validated',
),
38 => 
array (
    'id' => 45,
    'user_id' => 100,
'content' => 'Need to know if a request hits a specific named route? Laravel\'s `named()` method on routes makes it simple!',
'code' => 'if ($request->route()->named(\'profile\')) {
// ...
}

// or using the request() helper
if (request()->route()->named(\'profile\')) {
// ...
}',
    'created_at' => '2024-03-16 09:41:31',
    'updated_at' => '2024-03-16 11:24:51',
    'title' => 'Inspecting the Current Route',
    'slug' => 'inspecting-the-current-route',
    'status' => 'validated',
),
39 => 
array (
    'id' => 46,
    'user_id' => 22,
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
        'created_at' => '2024-03-16 09:45:57',
        'updated_at' => '2024-03-16 11:24:52',
        'title' => 'Enhance Readability and Maintainability with Enumerations for Model Attributes in Laravel',
        'slug' => 'enhance-readability-and-maintainability-with-enumerations-for-model-attributes-in-laravel',
        'status' => 'validated',
    ),
    40 => 
    array (
        'id' => 47,
        'user_id' => 63,
    'content' => 'Did you know that Laravel provides the `missing()` method to customize the default route model binding behavior when a model is not found? 🚀',
        'code' => 'use App\\Http\\Controllers\\LocationsController;
use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\Redirect;

Route::get(\'/locations/{location:slug}\', [LocationsController::class, \'show\'])
->name(\'locations.view\')
->missing(function (Request $request) {
return Redirect::route(\'locations.index\');
});',
    'created_at' => '2024-03-16 12:29:27',
    'updated_at' => '2024-03-16 14:02:02',
    'title' => 'Customize Missing Model Behavior',
    'slug' => 'customize-missing-model-behavior',
    'status' => 'validated',
),
41 => 
array (
    'id' => 48,
    'user_id' => 63,
'content' => 'Did you know that the Laravel HTTP Client comes with a fluent method called `withToken()` that you can use to set bearer tokens? 🚀',
    'code' => '// The following code 😑
Http::withHeaders([
\'Authorization\' => \'Bearer eyJhbGciOiJIUz...\',
]);

// Is equivalent to this 😎
Http::withToken(\'eyJhbGciOiJIUz...\');',
    'created_at' => '2024-03-16 12:30:22',
    'updated_at' => '2024-03-16 14:02:03',
'title' => 'The "withToken()" method',
    'slug' => 'the-withtoken-method',
    'status' => 'validated',
),
42 => 
array (
    'id' => 49,
    'user_id' => 63,
    'content' => 'Did you know that Laravel allows you to define callbacks to be executed based on the result of a scheduled task? This helps log failures or execute related actions on success 🚀',
'code' => '$schedule->command(\'emails:send\')
->daily()
->onSuccess(function () {
// The task succeeded...
})
->onFailure(function () {
// The task failed...
});',
'created_at' => '2024-03-16 12:31:08',
'updated_at' => '2024-03-16 14:02:04',
'title' => 'On Command Result',
'slug' => 'on-command-result',
'status' => 'validated',
),
43 => 
array (
'id' => 50,
'user_id' => 63,
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
'created_at' => '2024-03-16 12:32:09',
'updated_at' => '2024-03-16 14:02:05',
'title' => 'Command Input Auto-Completion',
'slug' => 'command-input-auto-completion',
'status' => 'validated',
),
44 => 
array (
'id' => 51,
'user_id' => 63,
'content' => 'You can chain commands in your scheduler using the `then()` method, an undocumented feature that I often find myself using 🚀',
'code' => '$schedule->command(\'db:backup\')
->daily()
->then(function () {
$this->command(\'notify:slack\');
});',
'created_at' => '2024-03-16 12:32:58',
'updated_at' => '2024-03-16 14:02:05',
'title' => 'Chain Scheduled Commands',
'slug' => 'chain-scheduled-commands',
'status' => 'validated',
),
45 => 
array (
'id' => 52,
'user_id' => 63,
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
'created_at' => '2024-03-16 12:34:21',
'updated_at' => '2024-03-16 14:02:06',
'title' => 'Model Binding in Form Requests',
'slug' => 'model-binding-in-form-requests',
'status' => 'validated',
),
));
        
        
    }
}