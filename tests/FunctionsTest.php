<?php
require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function testSuccessDisplayGames()
    {
        $expected = '<article class="collectionContainer">
            <img src="skyrim.jpg">
            <div class="collectionStats">
                <h2>The Elder Scrolls V: Skyrim</h2>
                <p>2011</p>
                <p>Bethesda Game Studios</p>
                <p>9.4</p>
            </div>
        </article>';
        $input = [
            [
                'image_url' => 'skyrim.jpg',
                'name' => 'The Elder Scrolls V: Skyrim',
                'year' => '2011',
                'developer' => 'Bethesda Game Studios',
                'imdb_rating' => '9.4'
            ],
        ];
        $case = displayGames($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureDisplayGames()
    {
        $expected = '';
        $input = [
            [
                'name' => 'Final Fantasy VII Remake',
                'year' => '2020',
                'developer' => 'Square Enix',
                'imdb_rating' => '9.0'
            ],
        ];
        $case = displayGames($input);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedDisplayGames()
    {
        $this->expectException(TypeError::class);
        $input = 'this is a string';
        $case = DisplayGames($input);
    }


    public function testSuccessValidateFormInput()
    {
        $expected = 'Valid';
        $case = validateFormInput('Last of Us', '2013', 'Naughty Dog', '9.7', 'https://upload.wikimedia.org/wikipedia/en/thumb/4/46/Video_Game_Cover_-_The_Last_of_Us.jpg/220px-Video_Game_Cover_-_The_Last_of_Us.jpg');
        $this->assertEquals($expected, $case);
    }

    public function testFailureValidateFormInput()
    {
        $expected = 'Invalid URL';
        $case = validateFormInput('Last of Us', '2013', 'Naughty Dog', '9.7', 'google');
        $this->assertEquals($expected, $case);
    }

    public function testMalformedValidateFormInput()
    {
        $this->expectException(TypeError::class);
        $input = [1, 2, 3];
        $case = validateFormInput($input);
    }
}