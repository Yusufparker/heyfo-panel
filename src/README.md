
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



### Get food

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

