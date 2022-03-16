<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    // public function test_of_ideas_show_on_main_page() {

    //     $ideaOne = Idea::factory()->create([
    //         'title' => 'My first Idea',
    //         'description' => 'description of my first idea'
    //     ]);
    //     $ideaTwo = Idea::factory()->create([
    //         'title' => 'My Second Idea',
    //         'description' => 'description of my Second idea'
    //     ]);

    //     $response = $this->get(route('idea.index'));
    //     $response->assertSuccessful();
    //     $response->assertSee($ideaOne->title);
    //     $response->assertSee($ideaOne->description);
    //     $response->assertSee($ideaTwo->title);
    //     $response->assertSee($ideaTwo->description);

    // }
    // /** @test */
    // public function test_of_idea_shows_on_show_page() {

    //     $idea = Idea::factory()->create([
    //         'title' => 'My first Idea',
    //         'description' => 'description of my first idea'
    //     ]);
        

    //     $response = $this->get(route('idea.show',$idea));
    //     $response->assertSuccessful();
    //     $response->assertSee($idea->title);
    //     $response->assertSee($idea->description);
        

    // }
}
