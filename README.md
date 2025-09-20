# Music Library
<img width="1590" height="1034" alt="screenshot" src="https://github.com/user-attachments/assets/04efca3a-9011-4d3c-8e85-9b3a4a0c1e99" />

Een muziekbibliotheek gebouwd met PHP (MVC) voor de module M5PROG. 

Dit project draait volledig in Docker (PHP, Nginx, MariaDB) en is opgezet met een MVC-structuur. Belangrijke features zijn de SEO-vriendelijke URLs en een zoekfunctie. Het was een leerzaam project waarin ik veel praktische ervaring opdeed met de volledige ontwikkelstack, van serverconfiguratie tot databasebeheer.

---

## Reflectie

*   **Uitdaging:** De Docker-databaseverbinding en de Nginx-configuratie voor mooie URLs.
*   **Oplossing:** Correcte `.env` instellingen en het gebruik van `try_files` in de Nginx-configuratie.
*   **Trots op:** De complete Docker-setup, de professionele URLs en de werkende zoekfunctie.

---

## Installatie

1. Clone de repository.
2. Kopieer `.env.example` naar `.env` en vul je waarden in.
3. Start de containers:
   ```bash
   docker compose up --build
   ```
4. Open de site op `http://localhost`.
5. Databasebeheer via PhpMyAdmin op `http://localhost:8805`.

---

## Auteur

* Naam: *Nick Esselman*
* Studentnummer: *38406*
* Vak: M5PROG - Music Library
