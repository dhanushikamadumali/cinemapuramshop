<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Frontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




// $route["index"]                          = "Frontend";
$route["shop"]                              = "Frontend/product";
$route["contact"]                           ="Frontend/contact";
$route["cart"]                              ="Frontend/cart";
$route["login"]                              ="Frontend/login";
$route["register"]                           ="Frontend/register";
$route["logout"]                             ="Frontend/logout";
$route["table_booking?(:any)"]               ="Frontend/tablebooking";
$route["terms_and_condition"]              ="Frontend/termscondition";
$route["privacy_policy"]                    ="Frontend/prypolcy";
$route["reurnrefund_policy"]                ="Frontend/retunrefundpolcy"; 
$route["ebill"]                              ="Frontend/ebill"; 


#region ------ backend -----
$route["dashboard"]                              = "Welcome";



#region ------- user -------
$route["User"]                        = "User";
$route["User/ajax"]                   = "User/user_ajax";
$route["User/view_user"]              = "User/user_view";
$route["User/Edit?(:any)"]            = "User/user_edit";
$route["User/add_cat"]                   = "User/add_cat";
$route["User/c_ajax"]                   = "User/c_ajax";

#region ------- user role -------
$route["Userrole"]                        = "Userrole";
$route["Userrole/ajax"]                   = "Userrole/user_role_ajax";
$route["Userrole/view_user_role"]         = "Userrole/view_user_role";
$route["Userrole/Edit?(:any)"]            = "Userrole/edit_user_role";



#endregion ------  End user------

#region ------- login -------
$route["login_user"]              = "Login";
// $route["Login"]         = "Login/login_user";
#endregion ------  End login------

#region ------- user -------
$route["Product"]                                       = "Product";
$route["Product/view_category"]                         = "Product/view_category";
$route["Product/Edit?(:any)"]                           = "Product/edit_category";
$route["Product/add_unit"]                              = "Product/add_unit";
$route["Product/view_unit"]                             = "Product/view_unit";
$route["Product/unitEdit?(:any)"]                       = "Product/edit_unit";
$route["Product/add_manu"]                              = "Product/add_manu";
$route["Product/view_manu"]                             = "Product/view_manu";
$route["Product/manuEdit?(:any)"]                       = "Product/edit_manu";
$route["Product/add_product"]                           = "Product/add_product";
$route["Product/view_product"]                          = "Product/view_product";
$route["Product/productEdit?(:any)"]                    = "Product/edit_product";
$route["Product/productDelete?(:any)"]                  = "Product/delete_product";



#region ------- stole item -------
$route["StoleItem/item_availability"]                   = "StoleItem/item_availability";
$route["StoleItem/stole_availability"]                  = "StoleItem/stole_availability";
$route["StoleItem/today_item_availability"]             = "StoleItem/today_item_availability";
$route["StoleItem/stole_order"]                         = "StoleItem/stole_order";

#region ------- branch -------
$route["Branch"]                                            = "Branch";
$route["Branch/view_branch"]                                = "Branch/view_branch";
// $route["Branch/view_category"]                         = "Product/view_category";
#endregion ------  End branch------


#region ------- supplier -------
$route["Supplier"]                                      = "Supplier";
$route["Supplier/view_supplier"]                        = "Supplier/view_supplier";
$route["Supplier/Edit?(:any)"]                          = "Supplier/edit_supplier";
$route["Supplier/supplier_purchase"]                    = "Supplier/supplier_purchase";

#endregion ------  End supplier------

#region ------- bank -------
$route["BankCompany"]                                   = "BankCompany";
$route["BankCompany/view_bank_company"]                 = "BankCompany/view_bank_company";
// $route["Branch/view_category"]                       = "Product/view_category";
#endregion ------  End bank------

#region ------- purchase -------
$route["Purchase"]                                      = "Purchase";
$route["Purchase/view_purchase"]                        = "Purchase/view_purchase";
$route["Purchase/Edit?(:any)"]                          = "Purchase/edit_purchase";
$route["Purchase/purchase_product"]                     = "Purchase/purchase_product";
#endregion ------  End purchase------
#region ------- pos -------
$route["Pos"]                                           = "Pos";
$route["Pos/pos_ajax"]                                  = "Pos/pos_ajax";
$route["Pos/Print/(:any)"]                              = "Pos/bill";
$route["Pos/Edit?(:any)"]                               = "Pos/edit_sales_hold_order";
$route["Pos/Printbill/(:any)"]                          = "Pos/printbill";
#endregion ------  End pos------

#region ------- customer -------
$route["Customer"]                                      = "Customer";
$route["Customer/view_customer"]                        = "Customer/view_customer";
$route["Customer/Edit?(:any)"]                          = "Customer/edit_customer";
$route["Customer/customer_sales_order"]                 = "Customer/customer_sales_order";
#endregion ------  End customer------

#region ------- payment -------
$route["Payment"]                                       = "Payment";
$route["Payment/view_payment"]                          = "Payment/view_payment";
#endregion ------  End payment------

#region ------- payment -------
$route["Sales"]                                         = "Sales";
$route["Sales/Edit?(:any)"]                             = "Sales/edit_sales";
$route["Sales/sales"]                                   = "Sales/sales";
$route["Sales/stole"]                                   = "Sales/stole";
$route["Sales/sales_weekly"]                            = "Sales/weeklysales";
$route["Sales/Salesweekly?(:any)"]                      = "Sales/salesweekly";
$route["Sales/Salesdailly"]                             = "Sales/salesdailly";
$route["Sales/Salesdailly?(:any)"]                      = "Sales/Salesdailly";
$route["Sales/settle_payment"]                          = "Sales/settle_payment";

#endregion ------  End payment------


$route["StoleItem/stole_payment"]                       = "StoleItem/stole_payment";
$route["StoleItem/view_stole_payment"]                  = "StoleItem/view_stole_payment";
$route["Stoleitem/stolepaymentEdit?(:any)"]             = "StoleItem/edit_stole_payment";



#region ------- employee -------
$route["Employee"]                        = "Employee";
$route["Employee/ajax"]                   = "Employee/employee_ajax";
$route["Employee/view_employee"]          = "Employee/employee_view";
$route["Employee/Edit?(:any)"]            = "Employee/employee_edit";
$route["Employee/employee_attendance"]    = "Employee/employee_attendance";


$route['api/odcallback']                            = 'api/Sales_order/order_callback';
// $route['api/students/store'] = 'api/ApiStudentController/storeStudent';
// $route['api/students/edit/(:any)'] = 'api/ApiStudentController/editStudent/$1';
// $route['api/students/update/(:any)'] = 'api/ApiStudentController/updateStudent/$1';
// $route['api/students/delete/(:any)'] = 'api/ApiStudentController/deleteStudent/$1';

$route["Product/featured"]                          = "product/featured_product";



