<?php
//Meta code
define('META_CODE_SUCCESS', 0);
define('META_CODE_ERROR', 1);

//msg Authen
define('MSG_401', 'authentication_401');
define('MSG_LOGIN_FAIL', 'login_fail');
define('MSG_LOGIN_SUCCESS', 'login_success');
define('VALIDATE_REGISTER', 'validate_register');
define('LOGIN_ACTIVE', 'login_active');
define('LOGIN_NEW', 'login_new');
define('LOGOUT_SUCCESS', 'you_have_logout');
//msg Chang password
define('MSG_CHANGE_PASSWORD_SUCCESS', "change_pass_success");
define('MSG_CHANGE_PASSWORD_VALIDATE', "validate_error");
define('MSG_CHANGE_PASSWORD_PASS_FAIL', "password invalid");

//msg register
define('MSG_REGISTER_SUCCESS', 'register_success');
define('DUPLICATE', '_duplicate');
define('NOT_DUPLICATE', 'value_not_duplicate');
define('CONFIRM_REGISTER', 'Xác nhận đăng ký tham gia ứng dụng mạng xã hội');
//msg Email
define('SEND_EMAIL_SUCCESS', "send success");

//msg channel
define('CHANNEL_ROM', "__roomChat:id=");
define('CHANNEL_NEW_FEED', "__newFeed:id=");
define('CHANNEL_COMMENT_FEED', "__commentNewFeed:id=");
define('CHANNEL_NOTIFY', '__notify:id=');

//Role
define('ADMIN_ROLE', 'admin');
define('USER_ROLE', 'user');

//Mesage
define('VALIDATE_MESSAGE','validate_message');
define('SEND_MESS_SUCCESS', 'send_mess_success');
define('SERVER_LOGIC', 'TRY CATCH CRASH LOGIC');
define('VALIDATE_LIST_CHAT','validate_list_chat');

//role
define('USER', 'user');
define('ADMIN', 'admin');
define('USER_ACTIVE', 1);
define('USER_NEW', 2);
define('USER_BLOCK', 3);
//common
define('ERROR_TYPE', 'not_type');
define('VALIDATE_SEND_CODE', 'validate_send_code');
define('VALIDATE_POST_COMMENT', 'validate_post_comment');
define('SEND_CODE_SUCCESS', 'send_code_success');
define('SEND_CODE_ERROR', 'send_code_error');
define('POST_TYPE_STATUS', 0);
define('POST_TYPE_IMAGE', 1);
define('POST_TYPE_VIDEO', 2);
define('POST_TYPE_SUBJECT', 3);
define('POST_TYPE_HOST', 4);
define('POST_TYPE_ONLY_TEXT', 5);
define('POST_TYPE_ONLY_ID', 6);
define('BOOL_TRUE', 1);
define('BOOL_FALSE', 0);
define('FILTER_ALL', 0);
define('MAX_VALUE', 99999999999);
define('ROOM_CHAT_NEW', 0);
define('ROM_CHAT_ACTIVE', 1);
define('ACTIVE', 1);
define('INACTIVE', 0);
define('SUBJECTID_VAR', 'subjectId');
define('UPLOAD_DIR', 'kma_social/');
define('FORMAT_CURRENT_TIME', 'Y-m-d H:i:s');
define('LIST_CONDITION_VALIDATE', 0);
define('LIST_MSG_VALIDATE', 1);
define('LIMIT_LIST_FRIENDS', 10);
define('VALIDATE_LIKE_NEW_FEED', 'validate_like_new_feed');
define('VALIDATE_GET_USER_DETAIL', 'validate_get_user_detail');
define('AVATAR_FOREIGN', 'get_avatar_other_table');
define('VALIDATE_POST','validate_post');
define('VALIDATE_HANDLE_SEARCH', 'validate_handle_search');
define('IMAGES_REQUIRED', 'images_required');
define('POST_NEW_SUCCESS', 'post_new_success');
define('GET_LIST_SUBJECT_SUCCESS', 'get_list_subject_success');
define('USER_ID', 'userId');
define('GET_USER_DETAIL_SUCCESS', 'get_user_detail_success');
define('GET_USER_DETAIL_ERROR', 'no_find_user');
define('GET_HISTORY_SEARCH_SUCCESS', 'get_history_search_success');
define('NO_RECORD', 'no_record');
?>
