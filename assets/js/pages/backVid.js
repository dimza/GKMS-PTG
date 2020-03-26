    s
    Get your Coverr
    License
    Contribute

    Subscribe for new videos

beautiful, free videos for your homepage
7 new videos every monday
Your browser does not support the video tag. I suggest you upgrade your browser. Your browser does not support the video tag. I suggest you upgrade your browser.

Coverr was made with by the CodersClan and Veed.Me teams
Coverrs

    All
    Food
    Mood
    Nature
    Tech
    Artsy
    People
    Urban
    Animals

Baggage Claim

New!

Fish Tank

New!

Go West

New!

Green

New!

Red

New!

The Tourist

New!

Ups and Downs

New!

Acro

Blue Bottle

Cello Guy

Good Mood

Pigeon Impossible

Rush Hour

Valentines

2 Ways Traffic

A Purple Balloon

PC Typing

Plug and Play

Puddle

Scroll It

Walking Away

Duck Duck Go

Go Goat

Major Tom

Pour

Skate

Under

Wall Sketching

Cycling Santa

Happy Street

In The Clouds

Merry Xmas

Moving Forward

Slow Dog

Thin Ice

Infinity

Ma Vibes

Runner

Slash

Sparks

White Board

Aloha Mundo

Cheer Up

Coffee Jet

Hoola

Horizontal

Typer

Undo

Backyard

Bull Creek

Country Girl

Drink Wine

Goat With The Wind

One Swan

Three Swans

Chandelier

Drums

Earlybird

Fire Ceremony

Mathura Bazaar

On The Ganges

Windy

Jackpot

Main Stream

Night BBQ

Out Camping

Type

Shakshuka

Traffic Tree

Coder

Fruity

Love Boat

Meeting Room

Night Out

Push the Buttons

The Boat

Blurry Night

Cut n Paste

Diverrs

Yellow Stone

Hitch Hiking

Lake Vibes

Rolling Horse

Agua Natural

Airtaxi

Big City Life

Crossroad

Gaiserr

Going Places

Relaxation

Broadway

Curiosity

Draw Something

Egg Shop

Market

Merry Go Round

Street View

Brooklyn

Coffee Shot

Falling Leaf

Hanging Out

Karate Kids

NYC Blurred Traffic

Sun Flower

Billowing

Beach Please

Home Work

Huppa

Innocence

Mowing The Lawn

Working It

A Working Man

Boarding

Construction

Go Fish

Night Traffic

Three Cocktails

YogaTime

A Director View

Beach Ball

Puppy

Escalation

Free Cows

I Love You

Mock Up

Girls Code

Holy Cow

Home

Melting Pot

NYC Traffic

Sky High

The Fountain

50 Percent Off

City Walking

Productive Morning

Clothing

Nature Sunset

Open Fire

We Work We Wait

Android Scroll

Beach Camera

iPhone Scroll

Lonely Chair

Surfers Paradise

The Dock

Veggie Stand

Working Space

Dancing Bulbs

Flow

Nowhere

Sugar

The Hose

The Poyke

Carmela

City Nights

Comfy

Head or Tails

New York Jam

Point of View

Slide Show

The Temple

Typing Numbers

Tomato Tomato

Ideas

Into The Woods

Its Clark

Mickey

Sail Away

Strum Away

Weekend

For Wes

Drips

Hosin

Right Way

Ristretto

The Crosswalk

White Balance

Agile

All Set

For Ems

It Was All Yellow

Mr. President

On The Vine

Scratch That

Cloudy Water

Dolores

Hello World

Puzzling

The Boulevard

Went Fetch

Winter Grass

Highrise

Shrimps on the Barbie

Blurred Traffic

Serene Lake

Flying Birds

Typing...

Yoga

Windy Tree

Hypnotize

Flea Market

Market People

Pedestrian

The Fishermen

Rusty Beach

Urban Blossom

Yoyo

Fish

Office Hours

Lamp

Lulu

Grass is Green
How to use

1. Download your favorite video.

2. Upload the video to your website.

3. Add the following snippets to your site

Be sure to change the 3 source paths marked in blue

    HTML
    CSS
    JavaScript

//jQuery is required to run this code
$( document ).ready(function() {

    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;

    console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

        if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}