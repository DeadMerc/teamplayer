define({ "api": [
  {
    "type": "get",
    "url": "/v1/data",
    "title": "getMainData",
    "version": "0.1.0",
    "name": "getMainData",
    "group": "Data",
    "description": "<p>getMainData</p> ",
    "filename": "app/Http/Controllers/DataController.php",
    "groupTitle": "Data",
    "sampleRequest": [
      {
        "url": "/api/v1/data"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/events/store",
    "title": "EventCreate",
    "version": "0.1.0",
    "name": "EventCreate",
    "group": "Events",
    "description": "<p>EventCreate</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>datetime</p> ",
            "optional": false,
            "field": "date",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "type_id",
            "description": "<p>id эвента, должен быть тот, где есть event c объекта match_type</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>file</p> ",
            "optional": false,
            "field": "image",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "place_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "allowedValues": [
              "\"0\"",
              "\"1\""
            ],
            "optional": false,
            "field": "public",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "team_id",
            "description": "<p>ID команды, которая выбрана на экране MyTeams</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "opponent",
            "description": "<p>Отсылается id реальной команды, если её выбрал пользователь</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "opponent_fake",
            "description": "<p>Отсылается название ( имя ) липовой команды</p> "
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/EventsController.php",
    "groupTitle": "Events",
    "sampleRequest": [
      {
        "url": "/api/v1/events/store"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/galery/upload",
    "title": "uploadImages",
    "version": "0.1.0",
    "name": "uploadImages",
    "group": "Galery",
    "description": "<p>uploadImages</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>array</p> ",
            "optional": false,
            "field": "image",
            "description": "<p>Массив картинок</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "team_id",
            "description": "<p>ID команду, в чью галерею загружаем</p> "
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/GalleryController.php",
    "groupTitle": "Galery",
    "sampleRequest": [
      {
        "url": "/api/v1/galery/upload"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/leagues/:id",
    "title": "League",
    "version": "0.1.0",
    "name": "League",
    "group": "Leagues",
    "description": "<p>Просмотр экрана League</p> ",
    "filename": "app/Http/Controllers/LeaguesController.php",
    "groupTitle": "Leagues",
    "sampleRequest": [
      {
        "url": "/api/v1/leagues/:id"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/leagues/store",
    "title": "LeagueCreate",
    "version": "0.1.0",
    "name": "LeagueCreate",
    "group": "Leagues",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>datetime</p> ",
            "optional": false,
            "field": "date_start",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>datetime</p> ",
            "optional": false,
            "field": "date_stop",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "sport_id",
            "description": "<p>From data pack</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "place_id",
            "description": "<p>From data pack</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "teams_max",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "description",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>file</p> ",
            "optional": true,
            "field": "image",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "age_min",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "age_max",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "level",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "duration",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "rules",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "registration_cost",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>double</p> ",
            "optional": false,
            "field": "lat",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>double</p> ",
            "optional": false,
            "field": "lon",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/LeaguesController.php",
    "groupTitle": "Leagues",
    "sampleRequest": [
      {
        "url": "/api/v1/leagues/store"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/leagues/:id/apply",
    "title": "applyLeague",
    "version": "0.1.0",
    "name": "applyLeague",
    "group": "Leagues",
    "description": "<p>кнопка apply на экране League</p> ",
    "filename": "app/Http/Controllers/LeaguesController.php",
    "groupTitle": "Leagues",
    "sampleRequest": [
      {
        "url": "/api/v1/leagues/:id/apply"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/matches/store",
    "title": "MatchCreate",
    "version": "0.1.0",
    "name": "MatchCreate",
    "group": "Matches",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "type_id",
            "description": "<p>From data pack, т.е. тип матча, например он часть лиги, или эвента</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "status_id",
            "description": "<p>From data pack</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "contest_id",
            "description": "<p>Сюда отправляется id лиги либо Event по базе</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>datetime</p> ",
            "optional": true,
            "field": "date",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "place_id",
            "description": "<p>From data pack</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>file</p> ",
            "optional": true,
            "field": "image",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "public",
            "description": "<p>0/1</p> "
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/MatchesController.php",
    "groupTitle": "Matches",
    "sampleRequest": [
      {
        "url": "/api/v1/matches/store"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/nearby",
    "title": "getData",
    "version": "0.1.0",
    "name": "getData",
    "group": "Nearby",
    "filename": "app/Http/Controllers/NearbyController.php",
    "groupTitle": "Nearby",
    "sampleRequest": [
      {
        "url": "/api/v1/nearby"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/notifies/fresh/count",
    "title": "CountFreshNotifies",
    "version": "0.1.0",
    "name": "CountFreshNotifies",
    "group": "Notifies",
    "description": "<p>CountFreshNotifies</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/NotifyController.php",
    "groupTitle": "Notifies",
    "sampleRequest": [
      {
        "url": "/api/v1/notifies/fresh/count"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/notifies/:type/:fresh",
    "title": "NotifiesByType",
    "version": "0.1.0",
    "name": "NotifiesByType",
    "group": "Notifies",
    "description": "<p>NotifiesByType</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "allowedValues": [
              "\"invite_to_event\"",
              "\"invite_to_team\"",
              "\"request_to_league\""
            ],
            "optional": false,
            "field": "type",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "fresh",
            "description": "<p>Если флаг установлен, то будут приходить уведомления, те которые не видел юзер</p> "
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/NotifyController.php",
    "groupTitle": "Notifies",
    "sampleRequest": [
      {
        "url": "/api/v1/notifies/:type/:fresh"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/notifies/accept/:id",
    "title": "NotifyAccept",
    "version": "0.1.0",
    "name": "NotifyAccept",
    "group": "Notifies",
    "description": "<p>Если тип уведомления invite_to_event ТО нужно слать команду, которая выбрана на первом экране MyTeams</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>ID уведомления</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "team_id",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/NotifyController.php",
    "groupTitle": "Notifies",
    "sampleRequest": [
      {
        "url": "/api/v1/notifies/accept/:id"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/notifies/decline/:id",
    "title": "NotifyDecline",
    "version": "0.1.0",
    "name": "NotifyDecline",
    "group": "Notifies",
    "description": "<p>Change state of notify used to 1</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "id",
            "description": "<p>ID уведомления</p> "
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/NotifyController.php",
    "groupTitle": "Notifies",
    "sampleRequest": [
      {
        "url": "/api/v1/notifies/decline/:id"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/notifies/all",
    "title": "allNotifies",
    "version": "0.1.0",
    "name": "allNotifies",
    "group": "Notifies",
    "description": "<p>allNotifies</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/NotifyController.php",
    "groupTitle": "Notifies",
    "sampleRequest": [
      {
        "url": "/api/v1/notifies/all"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/teams/my",
    "title": "MyTeams",
    "version": "0.1.0",
    "name": "MyTeams",
    "group": "Teams",
    "description": "<p>MyTeams метод не доделан до конца.</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/TeamsController.php",
    "groupTitle": "Teams",
    "sampleRequest": [
      {
        "url": "/api/v1/teams/my"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/teams/my",
    "title": "MyTeams",
    "version": "0.1.0",
    "name": "MyTeams",
    "group": "Teams",
    "description": "<p>MyTeams метод не доделан до конца.</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/TeamsController.php",
    "groupTitle": "Teams",
    "sampleRequest": [
      {
        "url": "/api/v1/teams/my"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/teams/store",
    "title": "TeamCreate",
    "version": "0.1.0",
    "name": "TeamCreate",
    "group": "Teams",
    "description": "<p>TeamCreate</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "token",
            "description": ""
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": false,
            "field": "sport_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "city",
            "description": "<p>Планируется получать из гугла название города/страны</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>file</p> ",
            "optional": false,
            "field": "image",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/TeamsController.php",
    "groupTitle": "Teams",
    "sampleRequest": [
      {
        "url": "/api/v1/teams/store"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/users/auth",
    "title": "Authorization",
    "version": "0.1.0",
    "name": "Authorization",
    "group": "Users",
    "description": "<p>Authorization user</p> ",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "email",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "password",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "sampleRequest": [
      {
        "url": "/api/v1/users/auth"
      }
    ]
  },
  {
    "type": "get",
    "url": "/v1/users/profile",
    "title": "Profile",
    "version": "0.1.0",
    "name": "Profile",
    "group": "Users",
    "description": "<p>Запрос получения данных для редактирования профиля и для просмотра с экрана nearby</p> ",
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "sampleRequest": [
      {
        "url": "/api/v1/users/profile"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/users/store",
    "title": "Registration",
    "version": "0.1.0",
    "name": "Registration",
    "group": "Users",
    "description": "<p>Регистрация пользователя</p> ",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "email",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": false,
            "field": "password",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "role_id",
            "description": "<p>По умолчанию ставятся права обычного пользователя</p> "
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "sampleRequest": [
      {
        "url": "/api/v1/users/store"
      }
    ]
  },
  {
    "type": "post",
    "url": "/v1/users/update",
    "title": "UpdateProfile",
    "version": "0.1.0",
    "name": "UpdateProfile",
    "group": "Users",
    "description": "<p>Обновление информации о пользователе</p> ",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "token",
            "description": "<p>Token с профиля пользователя, получается при регистрации и авторизации</p> "
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "password",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "role_id",
            "description": "<p>Список прав передаётся отдельно</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "first_name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "last_name",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "sport_id",
            "description": "<p>Вид спорта которым занимается, список передаётся отдельно</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "age",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>int</p> ",
            "optional": true,
            "field": "position_id",
            "description": "<p>Позиция в игре ( нападающий, защитник ), передаётся отдельно</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "allowedValues": [
              "\"male\"",
              "\"female\""
            ],
            "optional": true,
            "field": "sex",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>datetime</p> ",
            "optional": true,
            "field": "date_birth",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>file</p> ",
            "optional": true,
            "field": "image",
            "description": "<p>Аватар пользователя</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "android_push_id",
            "description": "<p>В зависимости от системы передаём нужный параметр</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "ios_push_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "time_zone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "phone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "about",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "<p>string</p> ",
            "optional": true,
            "field": "level",
            "description": ""
          }
        ]
      }
    },
    "filename": "app/Http/Controllers/UsersController.php",
    "groupTitle": "Users",
    "sampleRequest": [
      {
        "url": "/api/v1/users/update"
      }
    ]
  }
] });