<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    - var cards = [{ title: 'Mountain View', copy: 'Check out all of these gorgeous mountain trips with beautiful views
    of,
    you guessed it, the mountains', button: 'View Trips' }, { title: 'To The Beach', copy: 'Plan your next beach trip
    with
    these fabulous destinations', button: 'View Trips' }, { title: 'Desert Destinations', copy: 'It\'s the desert
    you\'ve
    always dreamed of', button: 'Book Now' },{ title: 'Desert Destinations', copy: 'It\'s the desert you\'ve always
    dreamed
    of', button: 'Book Now' },{ title: 'Desert Destinations', copy: 'It\'s the desert you\'ve always dreamed of',
    button:
    'Book Now' },{ title: 'Desert Destinations', copy: 'It\'s the desert you\'ve always dreamed of', button: 'Book Now'
    },{
    title: 'Desert Destinations', copy: 'It\'s the desert you\'ve always dreamed of', button: 'Book Now' },{ title:
    'Desert
    Destinations', copy: 'It\'s the desert you\'ve always dreamed of', button: 'Book Now' }, { title: 'Explore The
    Galaxy',
    copy: 'Seriously, straight up, just blast off into outer space today', button: 'Book Now' }]


    mixin card(title, copy, button)
    .card
    .content
    h2.title= title
    p.copy= copy
    button.btn= button

    main.page-content
    each card in cards
    +card(card.title, card.copy, card.button)
</body>

</html>