# Forma 1 témájú REST API feladatsor

## Projekt Feladat

Készítsen egy REST API-t Laravel keretrendszer használatával, amely megvalósítja az összes CRUD műveletet a Forma 1 témakörében.

## Feladatok

### 1. Adatbázis és migráció

*   Hozzon létre egy táblát az adatbázisban `teams` néven, amely az alábbi mezőket tartalmazza:
    *   `id`: Egész \[AI, PK] (csapat azonosító)
    *   `name`: Szöveg (max 50 karakter) (csapat neve)
    *   `country`: Szöveg (max 50 karakter) (csapat származási országa)
    *   `founded`: Dátum (alapítás dátuma)
    *   `team_principal`: Szöveg (max 50 karakter) (csapatvezető neve)
*   Hozzon létre egy másik táblát `drivers` néven:
    *   `id`: Egész \[AI, PK] (versenyző azonosító)
    *   `name`: Szöveg (max 50 karakter) (versenyző neve)
    *   `nationality`: Szöveg (max 50 karakter) (nemzetiség)
    *   `dob`: Dátum (születési dátum)
    *   `team_id`: Egész \[FK] (kapcsolat a csapatok táblájával)
*   Minden táblában szerepeljenek a `created_at` és `updated_at` mezők, valamint támogassák a SoftDelete-et.

### 2. Adatfeltöltés

*   Töltsön fel minta adatokat:
    *   Seeder és Factory segítségével maximum 10 csapattal és 20 versenyzővel.

### 3. Modellek

*   Hozzon létre két model-t (`Team`, `Driver`) a táblákhoz.
*   Állítsa be a kapcsolódó relációkat (egy csapathoz több versenyző tartozhat, `hasMany`).
*   Aktiválja a szigorú módot (`shouldBeStrict`).

### 4. Kontroller és útvonalak

*   Hozzon létre egy `TeamController`-t és egy `DriverController`-t, amelyek kezelik a CRUD műveleteket.
*   Az alábbi útvonalakat készítse el:
    *   Csapatok:
        1.  `GET /api/teams` – Listázza az összes csapatot.
        2.  `GET /api/teams/{id}` – Lekérés csapat ID alapján.
        3.  `POST /api/teams` – Új csapat hozzáadása.
        4.  `PUT /api/teams/{id}` – Csapat adatainak frissítése.
        5.  `DELETE /api/teams/{id}` – Csapat törlése (soft delete).
    *   Versenyzők:
        1.  `GET /api/drivers` – Listázza az összes versenyzőt.
        2.  `GET /api/drivers/{id}` – Lekérés versenyző ID alapján.
        3.  `POST /api/drivers` – Új versenyző hozzáadása.
        4.  `DELETE /api/drivers/{id}` – Versenyző törlése (soft delete).
    *   Külön szűrés:
        *   `GET /api/drivers?team_id={team_id}` – Versenyzők listázása csapat ID alapján.

### 5. Validáció

*   A validációt külön Request osztályokban végezze, például:
    *   `php artisan make:request StoreTeamRequest`
    *   `php artisan make:request StoreDriverRequest`
*   Szabályok példák:
    *   `name`: Kötelező (`required`), szöveg (`string`), maximum 50 karakter.
    *   `founded`: Kötelező (`required`), érvényes dátum (`date`).
    *   `team_id`: Léteznie kell a `teams` táblában (`exists:teams,id`).

### 6. További követelmények

*   Az index művelet támogassa a rendezést és szűrést query paraméterek alapján:
    *   Például: `GET /api/teams?sort_by=founded&order=desc`.