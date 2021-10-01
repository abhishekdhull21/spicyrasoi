# API Use Guide

- [Category add](#add-category "Category add")
- [Category fetch](#etch-category "Category fetch")

# #Category Add

---

**Method**: POST

> /category/add.php

**Request**

    {
        "admin":"2",
        "category":"ftg"
    }

**Response**

_Success:_

    {
      "success": true,
      "error": ""
    }

_error_:

    {
      "success": false,
      "error": "Category already exists"
    }

---

# #fetch category

**Method**: POST

> /category/fetch.php

**Request**
Request should be empty in that case all category retured active and non-active
{
"status":"true"
}

**Response**

_Success:_

    {
      "success": true,
      "data": [
        {
          "cat_id": "1",
          "cat_name": "ChatPatti",
          "status": "1",
          "created": "0000-00-00",
          "created_by": "2"
        },
        {
          "cat_id": "4",
          "cat_name": "ftg",
          "status": "1",
          "created": null,
          "created_by": "2"
        }
      ],
      "error": ""
    }

_error_:

    {
      "success": false,
      "error": "Category Not Found"
    }
