# 321Prompt
"321prompt.php" is a php script to generate prompts for A1111. (stable diffusion)
This involves creating a prompt text file with incremented weights to put in the A1111 interface: "Script/Prompts from file or textbox".

the PHP script works on a classic web server and I tried to make an extension for A1111 but one thing escapes me (it's buggy).
Do with it what you want!

You will be able to generate a prompt text of this type in 3-4 clicks:

a [cat: dog:0] in the garden , it's [Rainy: sunny: 1 ] Outside

a [cat: dog:0.125] in the garden , it's [Rainy: sunny: 0.875 ] Outside

a [cat: dog:0.25] in the garden , it's [Rainy: sunny: 0.75 ] Outside

a [cat: dog:0.375] in the garden , it's [Rainy: sunny: 0.625 ] Outside

a [cat: dog:0.5] in the garden , it's [Rainy: sunny: 0.5 ] Outside

a [cat: dog:0.625] in the garden , it's [Rainy: sunny: 0.375 ] Outside

a [cat: dog:0.75] in the garden , it's [Rainy: sunny: 0.25 ] Outside

a [cat: dog:0.875] in the garden , it's [Rainy: sunny: 0.125 ] Outside

a [cat: dog:1] in the garden , it's [Rainy: sunny: 0 ] Outside


Look at the screenshot (321prompt.png) for understand how to play with this script !

It's work with one sentence (sentence 1, and you do not have to fulfill sentence 2 !)
But you can fullfill sentence 1 + sentence 2 for more fun ! it's work !
And you can increase or decrease the weight for sentence 1 or increase or decrease weight for sentence 2.
Bye !

Demo here: [https://lostcantina.com/321prompt.php](https://lostcantina.com/321prompt.php)
(sorry, i'm french but you can translate easily with Chrome !)




