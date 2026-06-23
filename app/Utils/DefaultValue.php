<?php

namespace App\Utils;

class DefaultValue {
    const int PAGINATION_PER_PAGE = 10;
    const int PAGINATION_PAGE = 1;
    const string PAGINATION_PAGE_NAME = 'page';
    const array DATABASE_COLUMNS = ['*'];  
    const int RESPONSE_CODE_SUCCESS = 200;
    const int RESPONSE_CODE_INTERNAL_ERROR = 500;
    const string DATA_SORT_FIELD = 'id';
    const string DATA_SORT_TYPE = 'asc';
}
