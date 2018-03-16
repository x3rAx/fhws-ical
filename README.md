FHWS iCal encoding fixer
========================

Setup
-----

- Install [docker](https://docs.docker.com/install/) and
  [docker-compose](https://docs.docker.com/compose/install/)
- Clone this repo
- `cd /path/to/cloned/repo`
- Create file `.env`:
  - either symlink `example.env`: `ln -s example.env .env`
  - or, if you plan to change values, copy it: `cp example.env .env`
- Run `docker-compose run`

Then navigate to <http://localhost:8080/>.

