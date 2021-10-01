# API Use Guide

- Category add

# # Category Add

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
