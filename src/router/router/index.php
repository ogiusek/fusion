<?php namespace fusion\router;
require_once __DIR__."/interface.php";
use fusion\http\{Req, Res};

// interface IRouter{
//   public function request(Req $request): Res;
  
//   /**
//    * adds controller
//    * @return bool true if added
//    */
//   public function add_controller(/* controller */): bool;

//   /**
//    * adds pre middleware (does the same as add_pre_middleware)
//    * @return bool true if added
//    */
//   public function add_middleware(/* pre middleware */): bool;

//   /**
//    * adds post middleware
//    * @return bool true if added
//    */
//   public function add_post_middleware(/* post middleware */): bool;

//   /**
//    * adds pre middleware
//    * @return bool true if added
//    */
//   public function add_pre_middleware(/* pre middleware */): bool;
// }