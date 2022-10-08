<?php
session_start();
@include '../root-project.php';
include 'database.php';
// die();
@include dir_project() . 'app/resource/views/setting/config.php';

@$id   = $_GET['id'];

$no    = 1;

//for route.php

function dir_view($target)
{
  return dir_project() . "resource/views/$target.php";
}

function route_params()
{
  return $_GET['params'];
}

function ErrorRoute($condition)
{

  $execute = "";

  if ($condition  == "not_exist") {

    $execute = "404";
  }

  if ($condition  == "wrong_url") {

    $execute = "File Tidak Ada!";
  }

  include "error-route.php";
}

function urlHas($like)
{
  return strpos($_GET['params'], $like) !== false;
}

function strHas($str, $like)
{
  return strpos($str, $like) !== false;
}

function layouts($target)
{
  return dir_project() . "resource/layouts/$target";
}

function base_url($target)
{
  $projectName = explode("/", $_SERVER['SCRIPT_NAME']);
  echo $projectName[1] . "/" . $target;
}

function url($target)
{
  echo link_project() . "$target";
}

function this_url()
{
  return $_SERVER["REQUEST_URI"];
}

function controller($controllerName, $id = 0)
{

  if ($id) {
    @$id = $id;
  } else {
    @$id = $_GET['id'];
  }

  $controllerName = explode("@", $controllerName);

  echo link_project() . "app/core/controller.php?controllerName=$controllerName[0].php&function=$controllerName[1]&id=$id";
}

function controllerSetup($controllerName, $id = 0)
{
  if ($id) {
    @$id = $id;
  } else {
    @$id = $_GET['id'];
  }

  $controllerName = explode("@", $controllerName);

  echo link_project() . "app/core/controller-setup.php?controllerName=$controllerName[0].php&function=$controllerName[1]&id=$id";
}

function check($excecute)
{

  global $host;

  include 'check.php';

  die();
  exit();
}

function pre($excecute)
{

  echo "<pre>";

  var_dump($excecute);

  echo "</pre>";
}
function var_pre($excecute)
{

  echo "<pre>";

  var_dump($excecute);

  echo "</pre>";
  die();
  exit();
}

// REDIRECT

function alert($title = 0, $msg = 0, $typeAlert = 0)
{

  if (!$title) {
    $title = "Berhasil!";
  }

  if (!$msg) {
    $msg = "Berhasil";
  }

  if (!$typeAlert) {
    $typeAlert = "success";
  }

  @$_SESSION["title_alert"]   = $title;
  @$_SESSION["message_alert"] = $msg;
  @$_SESSION["type_alert"]    = $typeAlert;
}

function alertSetup($title = 0, $msg = 0, $typeAlert = 0)
{

  if (!$title) {
    $title = "Berhasil!";
  }

  if (!$msg) {
    $msg = "Berhasil";
  }

  if (!$typeAlert) {
    $typeAlert = "success";
  }

  @$_SESSION["title_alert_setup"]   = $title;
  @$_SESSION["message_alert_setup"] = $msg;
  @$_SESSION["type_alert_setup"]    = $typeAlert;
}

function view($target, $data = null)
{

  $anchor = null;

  foreach ($data as $key => $value) {
    if (is_object($value) || is_array($value)) {
      foreach ($value as $key1 => $value1) {
        $anchor[$key][$key1] = $value1;
      }
    } else {
      $anchor[$key] = $value;
    }
  }


  @$_SESSION["data"] = $anchor;

?>
  <script>
    window.location.replace("<?= link_project() . $target ?>")
  </script>
<?php

}

function to($target, $data = null)
{

  $anchor = null;

  foreach ($data as $key => $value) {
    if (is_object($value) || is_array($value)) {
      foreach ($value as $key1 => $value1) {
        $anchor[$key][$key1] = $value1;
      }
    } else {
      $anchor[$key] = $value;
    }
  }


  @$_SESSION["data"] = $anchor;
?>
  <script>
    window.location.replace("<?= link_project() . $target ?>")
  </script>
  <?php

}

/*
     *  MYSQL QUERY
     */

function query()
{
  $query = new Query;
  return $query;
}

class Query
{

  private $table         = "";
  private $select        = "";
  private $where         = "";
  private $Andwhere      = "";
  private $orderBy       = "";
  private $join          = "";
  private $leftJoin      = "";
  private $rightJoin     = "";
  private $praFinalQuery = "";
  private $finalQuery    = "";

  function table($table)
  {
    $this->table .= $table;
    return $this;
  }

  function select($selectColumn)
  {
    $this->select .= "SELECT " . $selectColumn . " FROM " . $this->table;
    return $this;
  }

  function join($table, $column)
  {
    $this->join .= " INNER JOIN $table ON $column";
    return $this;
  }

  function leftJoin($table, $column)
  {
    $this->leftJoin .= " LEFT JOIN $table ON $column";
    return $this;
  }

  function rightJoin($table, $column)
  {
    $this->rightJoin .= " RIGHT JOIN $table ON $column";
    return $this;
  }

  function where($where, $operator, $with = null)
  {

    if (!$with) {



      $this->where .= " WHERE $where = '$operator'";
    } else {

      $this->where .= " WHERE $where $operator '$with'";
    }

    return $this;
  }

  function andWhere($where, $operator, $with = null)
  {

    if (!$with) {

      $this->Andwhere .= " AND $where = '$operator'";
    } else {

      $this->Andwhere .= " AND $where $operator '$with'";
    }

    return $this;
  }

  function orderBy($column, $type)
  {
    $this->orderBy .= " ORDER BY $column " . $type;
    return $this;
  }

  function get()
  {

    global $host;

    if ($this->select) {

      $this->praFinalQuery = $this->select;
    }

    if (!$this->select) {

      $this->praFinalQuery = "SELECT * FROM " . $this->table;
    }

    if ($this->join) {

      $this->praFinalQuery = $this->praFinalQuery . $this->join;
    }

    if ($this->leftJoin) {

      $this->praFinalQuery = $this->praFinalQuery . $this->leftJoin;
    }

    if ($this->rightJoin) {

      $this->praFinalQuery = $this->praFinalQuery . $this->rightJoin;
    }

    if ($this->orderBy) {

      $this->praFinalQuery = $this->praFinalQuery . $this->orderBy;
    }

    if ($this->where) {

      $this->praFinalQuery = $this->praFinalQuery . $this->where;
    }

    if ($this->Andwhere) {

      $this->praFinalQuery = $this->praFinalQuery . $this->Andwhere;
    }

    $this->finalQuery = $this->praFinalQuery;

    return mysqli_query($host, $this->finalQuery);
  }

  function single()
  {

    global $host;

    if ($this->select) {

      $this->praFinalQuery = $this->select;
    }

    if (!$this->select) {

      $this->praFinalQuery = "SELECT * FROM " . $this->table;
    }

    if ($this->join) {

      $this->praFinalQuery = $this->praFinalQuery . $this->join;
    }

    if ($this->leftJoin) {

      $this->praFinalQuery = $this->praFinalQuery . $this->leftJoin;
    }

    if ($this->rightJoin) {

      $this->praFinalQuery = $this->praFinalQuery . $this->rightJoin;
    }

    if ($this->orderBy) {

      $this->praFinalQuery = $this->praFinalQuery . $this->orderBy;
    }

    if ($this->where) {

      $this->praFinalQuery = $this->praFinalQuery . $this->where;
    }

    if ($this->Andwhere) {

      $this->praFinalQuery = $this->praFinalQuery . $this->Andwhere;
    }

    $this->finalQuery = $this->praFinalQuery;

    return mysqli_fetch_object(mysqli_query($host, $this->finalQuery));
  }

  function limit($value)
  {
    return $this->get() . " LIMIT $value";
  }

  function raw($query)
  {
    global $host;
    return mysqli_query($host, $query);
  }

  /* 
        FUNCTION CRUD
      */

  /* CREATE */
  public function insert($table = 0, $values)
  {

    global $host;
    global $status;

    $data = (object) [];

    $values     = implode("','", $values);

    $dataValue  = "'" . $values . "'";

    $data->query = mysqli_query($host, "INSERT INTO $table VALUES(NULL,$dataValue)");

    $data->id    = $host->insert_id;

    if ($data->query) {

      $data          = true;
      $status       .= true;
    } else {

      $status       .= false;
    }

    return new self;
  }

  function getId()
  {
    global $host;
    return $host->insert_id;
  }
  /* END CREATE */

  /* UPDATE */
  public function update($table, $value, $whereColumn, $withColumn = 0)
  {
    global $host;
    global $status;
    global $status;

    $sql = null;
    foreach ($value as $k => $v) {
      $sql .= " $k='$v',";
    }

    $sql = trim($sql, ',');

    if (!$withColumn) {

      $command = mysqli_query($host, "UPDATE $table SET $sql WHERE " . getPrimary($table) . " = $whereColumn ");
    } else {

      $command = mysqli_query($host, "UPDATE $table SET $sql WHERE $whereColumn = $withColumn ");
    }


    if ($command) {

      $status       .= true;
    } else {

      $status       .= false;
    }

    unset($_SESSION['data']);

    return new self;
  }
  /* END UPDATE */

  public function delete()
  {
    global $host;
    global $status;

    $this->finalQuery = "DELETE FROM " . $this->table . $this->where;

    $command = mysqli_query($host, $this->finalQuery);

    if ($command) {

      $status       .= true;
    } else {

      $status       .= false;
    }

    return new self;
  }
  /* END DELETE */

  /* REDIRECT IF TRUE */
  public function view($target = 0, $msg = 0)
  {
    global $status;

    @$_SESSION["alert"] = $msg;

    if ($status) {

  ?>
      <script>
        window.location.replace("<?= link_project() . $target ?>")
      </script>
  <?php

    } else {
      check($status);
    }
  }
  /* END REDIRECT */
}

function rows($execute)
{
  return mysqli_num_rows($execute);
}

function assoc($execute)
{
  return mysqli_fetch_assoc($execute);
}

function getPrimary($table)
{
  global $host;
  $query = mysqli_query($host, "SHOW KEYS FROM " . $table . " WHERE Key_name = 'PRIMARY'");
  return mysqli_fetch_object($query)->Column_name;
}

/* END MYSQL QUERY*/


/* TABLE VIEW*/

function tr()
{
  echo "<tr>";
}

function td($list = null, $attr = null)
{
  echo "<td $attr >$list</td>";
}

function endtr()
{
  echo "</tr>";
}

function tombolHapus($target = null, $value = null, $attr  = null)
{
  return "<a href='$target' class='btn btn-sm btn-danger shadow' $attr><i class='fa fa-trash'></i> $value</a>";
}

function tombolEdit($target = null, $value = null, $attr  = null)
{
  return "<a href='$target' class='btn mx-1 btn-sm btn-warning shadow' $attr><i class='fa fa-edit'></i> $value</a>";
}

function tombolForm()
{

  $tombol  = "<div class='mt-3'>";
  $tombol .= "<a href='data' class='mx-1 btn btn-sm btn-warning float-right shadow'>Kembali</a>";
  $tombol .= "<button type='reset' class='mx-1 btn btn-sm btn-danger float-right shadow'>Reset</button>";
  $tombol .= "<button type='submit' class='mx-1 btn btn-sm btn-primary float-right shadow'>Simpan</button>";
  $tombol .= "</div>";

  echo $tombol;
}

/* END */

/*For Edit View*/

function loadView($target, $data = null)
{

  if (strHas($target, "auth")) {

    if (strHas($target, "register")) {

      @include dir_project() . 'resource/views/backend/Auth/register.php';

      die();
    } else {

      @include dir_project() . 'resource/views/backend/Auth/login.php';

      die();
    }
  }

  if (strHas($target, "backend")) {

    loadViewBackend($target, $data);
  }

  if (strHas($target, "frontend")) {

    loadViewFrontend($target, $data);
  }
}

function loadViewBackend($target, $data)
{

  global $backendHeader;
  global $backendFooter;

  include dir_project() . 'app/global/GlobalVariable.php';

  if (@file_exists(dir_project() . 'resource/views/' . $target . '.php')) {

    if (!urlHas('backend/auth')) {

      $no = 1;

      foreach ($data as $key => $value) {
        ${$key} = $value;
      }

      @include layouts($backendHeader);
      @include dir_view($target);
      @include layouts($backendFooter);
    } else {

      @include dir_view(route_params());
    }
  }

  die();
}

function loadViewFrontend($target, $data)
{

  global $frontendHeader;
  global $frontendFooter;

  include dir_project() . 'app/global/GlobalVariable.php';

  if (@file_exists(dir_project() . 'resource/views/' . $target . '.php')) {

    if (!urlHas('backend/auth')) {

      $no = 1;

      foreach ($data as $key => $value) {
        ${$key} = $value;
      }

      @include layouts($frontendHeader);
      @include dir_view($target);
      @include layouts($frontendFooter);
    } else {

      @include dir_view(route_params());
    }
  }

  die();
}

function ambil(array $params)
{
  mysqli_fetch_object($params);
}
/* END */

/* HITUNG DATA */

function hitung($data)
{
  return $data->num_rows;
}
/* END HITUNG DATA */


/*
    * ALL ABOUT FILES
    */

function asset($target)
{

  if (strpos($_SERVER['REQUEST_URI'], 'core/controller') !== false) {
    return dir_project() . "resource/assets/$target";
  }

  return link_project() . "resource/assets/$target";
}

function uploads($target)
{

  if (!is_dir(dir_project() . "resource/assets/uploads/")) {
    mkdir(dir_project() . "resource/assets/uploads/");
  }

  return dir_project() . "resource/assets/uploads/$target";
}

/* update fix bug move in upload files */

function files($nameField, $newNameFile = null)
{
  if ($newNameFile) {

    return $newNameFile . '.' . pathinfo($_FILES[$nameField]['name'], PATHINFO_EXTENSION);
  } else {

    return $_FILES[$nameField]['name'];
  }
}

function type_files($nameField)
{
  return pathinfo($_FILES[$nameField]['name'], PATHINFO_EXTENSION);
}

function tmp($nameField)
{
  return $_FILES[$nameField]['tmp_name'];
}

function move($tmp, $target)
{
  return move_uploaded_file($tmp, $target);
}

/* end */

function resource($target)
{
  global $protokol;
  $projectName = explode("/", $_SERVER['SCRIPT_NAME']);
  $root        = $_SERVER['HTTP_HOST'];
  return link_project() . "resource/$target";
}

function hapus($file)
{
  return unlink(asset($file));
}

function getId()
{
  global $host;
  return $host->insert_id;
}

/**END FILES */


/* FOR VIEWS SETUP */

function dir_project($link = null)
{
  global $rootDir;
  return $rootDir . $link;
}

function link_project($link = null)
{
  global $rootUrl;
  return $rootUrl . $link;
}

function last_url()
{
  $url = explode("/", $_SERVER["REQUEST_URI"]);
  return $url[count($url) - 1];
}

function url_number($url_ke)
{
  $url = explode("/", $_SERVER["REQUEST_URI"]);
  return $url[$url_ke];
}

function asset_setup($target = null)
{
  return link_project() . "app/resource/assets/$target";
}

function layouts_setup($target)
{

  return dir_project() . "app/resource/layouts/$target.php";
}

function setup_view($target)
{
  return dir_project() . "app/resource/views/$target.php";
}

function notFound()
{
  include layouts_setup('header');
  include setup_view('errors/404');
  include layouts_setup('footer');
}

function badGeteway()
{
  include layouts_setup('header');
  include setup_view('errors/502');
  include layouts_setup('footer');
}

function redirectHas($like)
{

  global $redirectView;

  return strpos($redirectView, $like) !== false;
}

function syncsetup()
{

  $viewSetup = explode("setup", route_params());
  $viewSetup = $viewSetup[1];

  @include dir_project() . 'app/global/GlobalVariable.php';
  @include dir_project() . 'app/config-project.php';

  if (@file_exists(dir_project() . 'app/resource/views/' . $viewSetup . '.php')) {

    global $DATABASE;
    global $host;
    $no = 1;

    include dir_project() . 'app/core/parse-variable.php';
    // die();

    include layouts_setup('header');
    include layouts_setup('menu');
    include layouts_setup('navbar');

    include dir_project() . 'app/config.php';

    /* include views from app/resource/views */
    include setup_view($viewSetup);

    include layouts_setup('footer');
  } else {

    notFound();
  }
}

function syncbackend()
{
  global $backendHeader;
  global $backendFooter;

  include dir_project() . 'app/core/parse-variable.php';
  @include dir_project() . 'app/global/GlobalVariable.php';

  if (@file_exists(dir_project() . 'resource/views/' . route_params() . '.php')) {

    if (!urlHas('backend/auth')) {

      $no = 1;

      @include layouts($backendHeader);
      @include dir_view(route_params());
      @include layouts($backendFooter);
    } else {

      @include dir_view(route_params());
    }
  } else {

    notFound();
  }
}

function syncfrontend()
{

  global $frontendHeader;
  global $frontendFooter;
  $no = 1;

  include dir_project() . 'app/core/parse-variable.php';
  @include dir_project() . 'app/global/GlobalVariable.php';

  if (@file_exists(dir_project() . 'resource/views/frontend/' . route_params() . '.php')) {

    @include layouts($frontendHeader);
    @include dir_view('frontend/' . route_params());
    @include layouts($frontendFooter);
  } else {

    notFound();
  }
}

function syncloginpage()
{

  include dir_project() . 'app/core/parse-variable.php';
  @include dir_project() . 'app/global/GlobalVariable.php';

  if (@file_exists(dir_project() . 'resource/views/auth/login.php')) {

    include dir_view('backend/auth/login');
  } else {

    notFound();
  }
}

/* FOR REDIRECT */

function redirect_view($target)
{
  return "resource/views/$target.php";
}

function redirect_layouts($target)
{
  return "resource/layouts/$target";
}

function redirectNotFound()
{
  include 'app/resource/layouts/header.php';
  include 'app/resource/views/errors/404.php';
  include 'app/resource/layouts/footer.php';
}

function activeClass($like)
{
  if (urlHas($like)) {
    return "active";
  }
}

function back($url = 0)
{

  if ($url) {

    $baseUrl = $_SERVER['HTTP_REFERER'];
    $baseUrl = explode("/", $baseUrl);

    $getLast = end($baseUrl);

    $finalUrl = str_replace($getLast, $url, $baseUrl);
    $finalUrl = implode(" ", $finalUrl);
    $finalUrl = str_replace(" ", "/", $finalUrl);

    return header('Location: ' . $finalUrl);
  } else {

    return header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}

/* for auth */

function auth()
{

  $auth = new Auth;
  return $auth;
}

class Auth
{

  function session()
  {
    return @$_SESSION['auth'];
  }

  function id()
  {
    return @$_SESSION['auth_id'];
  }

  function username()
  {
    return @$_SESSION['auth_username'];
  }

  function email()
  {
    return @$_SESSION['auth_email'];
  }

  function level()
  {
    return @$_SESSION['auth_level'];
  }
}

/* end auth */

/* about session */

function session($name = 0, $value = 0)
{

  if (empty($value)) {

    return @$_SESSION[$name];
  } else {

    return @$_SESSION[$name] = $value;
  }
}

function getSession()
{
  return check(@$_SESSION);
}

/* end session*/


/* for button delete in view data backend */
function buttonDelete($table)
{

  $html = '<button type="submit" class="btn btn-danger btn-sm shadow">
                  <i class="fa fa-trash"></i>
              </button>';

  $hitungData = query()->table($table)->get();

  if (hitung($hitungData) > 0) {

    return $html;
  }
}
/* end button */

// DMAKS
$content_data = null;
function content($contentName)
{
  global $content_data;
  $content_data[$contentName] = null;

  ob_start();
  ob_clean();
}

function endContent($contentName)
{
  global $content_data;
  $content_data[$contentName] = ob_get_clean();
  ob_flush();
}

function getContent($contentName)
{
  global $content_data;
  if (empty($content_data[$contentName])) {
    // getContent($contentName);
  } else {
    echo $content_data[$contentName];
  }
}

function check_table($nama_table)
{
  global $host;
  global $DATABASE;
  $checkTable = mysqli_num_rows(mysqli_query($host, "SHOW TABLES IN $DATABASE LIKE '$nama_table'"));
  $hasil = ($checkTable > 0) ? true : false;
  return $hasil;
}

/* ATTR FORM */
function selected($data, $like)
{
  return ($data == $like) ? "selected" : "";
}

function disabled($data, $like)
{
  return ($data == $like) ? "disabled" : "";
}


/**
 * Return Response
 */

if (!function_exists("json_response")) {

  function json_response($data, string $message = null, int $status = null, array $option = [])
  {
    $status_code = [
      "200" => "OK",
      "201" => "Created",
      "202" => "Accepted",
      "400" => "Bad Request",
      "422" => "Unprocessable Entity",
      "500" => "Internal Server Error",
      "502" => "Bad Gateway",
      "503" => "Service Unvailable",
      "504" => "Gateway Timeout"
    ];

    header_remove();
    http_response_code($status);
    header("Cache-Controll no-transform, max-age=300, s-maxage=900");
    header("Content-Type: application/json; charset=utf8");
    header("HTTP/1.1" . $status);

    cors();

    $response = [

      "status"  => $status,
      "message" => $message,
      "data"    => $data

    ];

    $result = json_encode($response);

    echo $result;

    die();
  }
}

/**
 *  An example CORS-compliant method.  It will allow any GET, POST, or OPTIONS requests from any
 *  origin.
 *
 *  In a production environment, you probably want to be more restrictive, but this gives you
 *  the general idea of what is involved.  For the nitty-gritty low-down, read:
 *
 *  - https://developer.mozilla.org/en/HTTP_access_control
 *  - https://fetch.spec.whatwg.org/#http-cors-protocol
 *
 */
function cors()
{

  // Allow from any origin
  if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
  }

  // Access-Control headers are received during OPTIONS requests
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      // may also be using PUT, PATCH, HEAD etc
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
  }
}

/* End Response */

function notif($title, $desc = 0, $type = 0)
{

  echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
  echo '<div style="display:none"></div>';
  echo "<script type='text/javascript'>
              Swal.fire(
                  '$title',
                  '$desc',
                  '$type'
                );
            </script>";
}

function redirect($url)
{

  ?>
  <script>
    window.location.replace("<?= link_project() . $url ?>")
  </script>
<?php

}
