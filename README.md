JUST BIBLE API v2
----------------------------------

**Get an object with all the books of the Bible in the specified translation:**

    https://justbible.ru/api/bible?translation=nasb

Specify the translation of the required request parameter.

**Get an object with the entire book of the Bible:**

    https://justbible.ru/api/bible?translation=nasb&book=1

**Get an object with one chapter from the selected Bible book:**

    https://justbible.ru/api/bible?translation=nasb&book=66&chapter=1

**Get an object with one verse from the selected chapter and selected book of the Bible:**

    https://justbible.ru/api/bible?translation=nasb&book=43&chapter=1&verse=3

**Get an object with a range of verses from a selected chapter and book in the Bible:**

    https://justbible.ru/api/bible?book=53&chapter=13&verses=4-8

**Get an object with a list of specified verses from the selected chapter and book in the Bible:**

    https://justbible.ru/api/bible?translation=nasb&book=43&chapter=1&verses=1,3,14

**All parameters of the GET request to the API Just Bible**

`https://justbible.ru/api/bible`

| Parameter     | type     | Acceptable values / format | Comments                                   |
|--------------|-----------|--------------|-----------------------------------------------|
| translation  |  `string` | `nasb`, `rbo`, `rst` | Required parameter. `rbo` - Modern Russian Translation RBO, `rst` - Synodal Russian Translation, `nasb` - New American Standard Bible |
| book         | `number`  | `1`-`66`       | The ordinal number of the book in the Bible Russian Synodal Text. The range of numbers is 1-66, where 1-39 are the books of the Old Testament, with 40-66 the books of the New Testament |
| chapter      | `number`  | from `1` to max value | Max value depends on the number of chapters in the Bible book. If the specified chapter number does not exist, an error will be returned. |
| verse        | `number`  | `1` to max value      | Max value depends on the number of verses in selected chapter of selected book of the Bible. If the specified verse number does not exist, an error will be returned. |
| verses        | `string`  | format is `1-5`, `10,15,20` | String format is a range of specified verses separated by hyphens or commas. If the specified verse number does not exist, an error will be returned. |

**Numbering of books in the Bible**

| book (number)    | In russians translations          | In English translation                     |
|------------------|-----------------------------------|--------------------------------------------|
| 1                | Бытие                             | Genesis                                    |
| 2                | Исход                             | Exodus                                     |
| 3                | Левит                             | Leviticus                                  |
| 4                | Числа                             | Numbers                                    |
| 5                | Второзаконие                      | Deuteronomy                                |
| 6                | Иисус Навин                       | Joshua                                     |
| 7                | Судьи                             | Judges                                     |
| 8                | Руфь                              | Ruth                                       |
| 9                | 1 Царств                          | 1 Samuel                                   |
| 10               | 2 Царств                          | 2 Samuel                                   |
| 11               | 3 Царств                          | 1 Kings                                    |
| 12               | 4 Царств                          | 2 Kings                                    |
| 13               | 1 Паралипоменон                   | 1 Chronicles                               |
| 14               | 2 Паралипоменон                   | 2 Chronicles                               |
| 15               | Ездра                             | Ezra                                       |
| 16               | Неемия                            | Nehemiah                                   |
| 17               | Есфирь                            | Esther                                     |
| 18               | Иов                               | Job                                        |
| 19               | Псалмы                            | Psalms                                     |
| 20               | Притчи                            | Proverbs                                   |
| 21               | Екклезиаст                        | Ecclesiastes                               |
| 22               | Песнь песней                      | Song of Solomon                            |
| 23               | Исаия                             | Isaiah                                     |
| 24               | Иеремия                           | Jeremiah                                   |
| 25               | Плач Иеремии                      | Lamentations                               |
| 26               | Иезекииль                         | Ezekiel                                    |
| 27               | Даниил                            | Daniel                                     |
| 28               | Осия                              | Hosea                                      |
| 29               | Иоиль                             | Joel                                       |
| 30               | Амос                              | Amos                                       |
| 31               | Авдий                             | Obadiah                                    |
| 32               | Иона                              | Jonah                                      |
| 33               | Михей                             | Micah                                      |
| 34               | Наум                              | Nahum                                      |
| 35               | Аввакум                           | Habakkuk                                   |
| 36               | Софония                           | Zephaniah                                  |
| 37               | Аггей                             | Haggai                                     |
| 38               | Захария                           | Zechariah                                  |
| 39               | Малахия                           | Malachi                                    |
|                  |                                   |                                            |
| 40               | Матфей                            | Matthew                                    |
| 41               | Марк                              | Mark                                       |
| 42               | Лука                              | Luke                                       |
| 43               | Иоанн                             | John                                       |
| 44               | Деяния                            | Acts                                       |
| 45               | Иакова                            | James                                      |
| 46               | 1 Петра                           | 1 Peter                                    |
| 47               | 2 Петра                           | 2 Peter                                    |
| 48               | 1 Иоанна                          | 1 John                                     |
| 49               | 2 Иоанна                          | 2 John                                     |
| 50               | 3 Иоанна                          | 3 John                                     |
| 51               | Иуда                              | Jude                                       |
| 52               | Римлянам                          | Romans                                     |
| 53               | 1 Коринфянам                      | 1 Corinthians                              |
| 54               | 2 Коринфянам                      | 2 Corinthians                              |
| 55               | Галатам                           | Galatians                                  |
| 56               | Ефесянам                          | Ephesians                                  |
| 57               | Филиппийцам                       | Philippians                                |
| 58               | Колоссянам                        | Colossians                                 |
| 59               | 1 Фессалоникийцам                 | 1 Thessalonians                            |
| 60               | 2 Фессалоникийцам                 | 2 Thessalonians                            |
| 61               | 1 Тимофею                         | 1 Timothy                                  |
| 62               | 2 Тимофею                         | 2 Timothy                                  |
| 63               | Титу                              | Titus                                      |
| 64               | Филимону                          | Philemon                                   |
| 65               | Евреям                            | Hebrews                                    |
| 66               | Откровение                        | Revelation                                 |


Search for words by text in the Bible
---------------------------------------------------

**Search for the word "love" in the specified translation:**

    https://justbible.ru/api/search?translation=nasb&search=love

**API GET Request Parameters**

`https://justbible.ru/api/search`

| Parameter     | type     | Acceptable values    | Comments                                   |
|--------------|-----------|--------------|-----------------------------------------------|
| translation  |  `string` | `nasb`, `rbo`, `rst` | Required parameter.  `rbo` - Modern Russian Translation RBO, `rst` - Synodal Russian Translation, `nasb` - New American Standard Bible |
| search       | `string`  | Min length 3 characters | A word or phrase in English to be translated from the listening text. |

Getting a random Bible verse
--------------------------------------

**Random verse from a selected Bible translation:**

    https://justbible.ru/api/random?translation=nasb

**API GET Request Parameters**

`https://justbible.ru/api/random`

| Parameter     | type     | Acceptable values    | Comments                                   |
|--------------|-----------|--------------|-----------------------------------------------|
| translation  |  `string` | `nasb`, `rbo`, `rst` | Required parameter. `rbo` - Modern Russian Translation RBO, `rst` - Synodal Russian Translation, `nasb` - New American Standard Bible |
