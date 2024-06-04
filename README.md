
# HeyFo APi Documentation

HeyFo API memungkinkan anda mendapatkan rekomendasi makanan sehat dan lezat dengan mendeteksi gambar bahan makanan yang tersedia.


## API Reference

```http
  https://heyfo-6ppaqiiwua-et.a.run.app/api
```


### Get all foods

```http
  GET /api/foods
```
#### Contoh response

```
{
    "data": [
        {
            "uuid": "090fe96f-ae00-4799-a99c-76133693ae87",
            "name": "Sup Ayam Sayur",
            "image_url": "https://img.herstory.co.id/articles/archive_20220920/resep-masakan-20220920-125548.jpg"
        },
        {
            "uuid": "8a1f4a3a-0c75-4ed3-ad08-4f84fb9ef43c",
            "name": "Salad Sayurann dengan Dressing Yoghurt",
            "image_url": "https://tse3.mm.bing.net/th?id=OIP.YjPWdWsMbaN0LTen-_QkIAHaEK&pid=Api&P=0&h=220"
        },

        `dan data lainnya..


    ]
}
```



### Get detail food

```http
  GET /api/foods/${uuid}
```
#### Query String


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `uuid`      | `string` | **Required** |

#### Contoh response

```
{
    "data": {
        "uuid": "090fe96f-ae00-4799-a99c-76133693ae87",
        "name": "Sup Ayam Sayur",
        "image_url": "https://img.herstory.co.id/articles/archive_20220920/resep-masakan-20220920-125548.jpg",
        "ingredients": [
            "500 gram potong-potong daging ayam",
            "1 liter air",
            "1 buah potong-potong wortel",
            "1 buah potong-potong kentang",
            "1 batang seledri",
            "iris tipis bawang bombai",
            "2 siung bawang putih",
            "garam",
            "lada"
        ],
        "cooking_step": [
            "Rebus air dalam panci hingga mendidih.",
            "Masukkan ayam kampung, wortel, kentang, dan seledri. Rebus hingga ayam matang dan sayuran lunak.",
            "Tumis bawang bombay dan bawang putih hingga harum.",
            "Masukkan tumisan bawang bombay dan bawang putih ke dalam panci sup.",
            "Bumbui dengan garam dan lada secukupnya.",
            "Aduk rata dan masak sebentar hingga bumbu meresap.",
            "Sajikan sup ayam sayuran selagi hangat."
        ]
    }
}
```

### Food Prediction

```http
  POST /api/predict
```




| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `image`      | `file` | **Required** |

#### Contoh response

```
{
    "predict_result": [
        "kentang",
        "semangka"
    ],
    "data": [
        {
            "id": 1,
            "uuid": "090fe96f-ae00-4799-a99c-76133693ae87",
            "name": "Sup Ayam Sayur",
            "image_url": "https://img.herstory.co.id/articles/archive_20220920/resep-masakan-20220920-125548.jpg",
            "matched_ingredients": [
                "kentang"
            ],
            "unmatched_ingredients": [
                "daging ayam",
                "air",
                "wortel",
                "seledri",
                "bawang bombai",
                "bawang putih",
                "garam",
                "lada"
            ]
        },

        `data lainnya disini`

    ]
}
```


### Get all articles

```http
  GET /api/articles
```
#### Contoh response

```
{
    "data": [
        {
            "uuid": "5f259cc1-ef43-3742-9a74-414747d3a16d",
            "author": "Administrator",
            "title": "Nihil quia enim similique deserunt quaerat vitae quia.",
            "image": "https://source.unsplash.com/random/640x480/?article"
        },
        {
            "uuid": "1cacc733-6b62-3662-8687-e3c41fe05ee1",
            "author": "Administrator",
            "title": "Dignissimos similique laboriosam quaerat fugiat.",
            "image": "https://source.unsplash.com/random/640x480/?article"
        },

        `dan data lainnya`

    ]
}
```

### Get detail articles

```http
  GET /api/articles/${uuid}
```
#### Query String


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `uuid`      | `string` | **Required** |

#### Contoh response

```
{
    "data": {
        "uuid": "3efce2b1-0de5-32cb-8379-443b3889582a",
        "author": "Administrator",
        "title": "Accusamus eligendi quo rerum.",
        "body": "Ut harum tenetur voluptas ipsum beatae. Non sed magnam a eius eos quisquam. Deserunt enim ut ratione ut nam sint.\n\nRecusandae ea voluptas consequatur at ut molestiae molestiae perspiciatis. Quis nesciunt vel similique esse amet quae veniam. Doloremque reprehenderit aliquam quaerat dolore tempora quos harum. Ut esse vitae beatae rem cupiditate.\n\nRepellendus reprehenderit molestiae non accusantium molestiae similique sint. Facilis quas dolorum qui at minus illo quae. Aliquid numquam totam rerum voluptas dolor.",
        "image_url": "https://source.unsplash.com/random/640x480/?article",
        "created_at": "04 June 2024"
    }
}
```