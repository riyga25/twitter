# PHP/Twitter-API-PHP

Приложение использует библиотеку [Twitter-API-PHP](http://github.com/j7mbo/twitter-api-php).  
А занимается оно тем что записывает и выводит на экран тех кто сделал ретвит конкретного твита.
Используя twitter API 1.1 ([GET statuses/retweets/:id](https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweets-id)).  
Достает только 100 последних человек (это по документации ( _Must be less than or equal to 100_)), но на деле 93-94 человека. С чем связано не понятно.  

## Дополнительно

Так как приложение создавалось для конкурса, то оно еще определяет победителя (**JS** `randomInteger()`) выплевывая его в модальное окно.