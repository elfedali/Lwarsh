# Warsh Quran API

This project provides an API for accessing the Warsh version of the Quran. It includes endpoints for retrieving Surahs and Ayahs, along with their details.

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/elfedali/Lwarsh.git
    cd Lwarsh
    ```

2. Install the dependencies:

    ```sh
    composer install
    ```

3. Copy the [.env.example](http://_vscodecontentref_/1) file to [.env](http://_vscodecontentref_/2) and configure your database settings:

    ```sh
    cp .env.example .env
    ```

4. Generate the application key:

    ```sh
    php artisan key:generate
    ```

5. Run the database migrations and seed the database:
    ```sh
    php artisan migrate --seed
    ```

## API Endpoints

Get### All Surahs

**Endpoint:** `GET /api/surahs`

**Response:**

```json
[
    {
        "id": 1,
        "surah_no": 1,
        "surah_name_en": "Al-Fatihah",
        "surah_name_ar": "الفاتحة",
        "number_of_ayahs": 7,
        "place": "Makkah",
        "links": {
            "self": "http://yourdomain.com/api/surahs/1",
            "next": "http://yourdomain.com/api/surahs/2",
            "previous": null
        }
    },
    ...
]
```
