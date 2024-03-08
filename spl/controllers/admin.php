<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL);
            exit;
        }
    }

    function modify_order($order_id) {
        $this->view->order_id = $order_id;
        $this->view->customer = $this->model->get_customer_order_id($order_id);
        $this->view->package = $this->model->get_all_packages();
        $this->view->render('admin/modify_order');
    }

    function profile() {
        $this->view->render('admin/profile');
    }

    function order_preview() {
        $this->view->render('admin/order_preview');
    }

    function index() {
        $this->view->package = $this->model->get_all_packages();
        $this->view->render('admin/index');
    }

    function customer() {
        $this->view->render('admin/customer');
    }

    function stock_correction() {
        $this->view->render('admin/stock_correction');
    }

    function invoices() {
        $this->view->render('admin/invoices');
    }

    function products() {
        $this->view->package = $this->model->get_all_packages();
        $this->view->render('admin/products');
    }

    function reports_sales() {
        $this->view->render('admin/reports_sales');
    }

    function reports_stocks() {
        $this->view->render('admin/reports_stocks');
    }

    function orders() {
        $this->view->render('admin/orders');
    }

    function new_order() {
        $this->view->package = $this->model->get_all_packages();
        $this->view->order_id = $this->model->insert_order_temp();
        $this->view->render('admin/new_order');
    }

    function stocks() {
        $this->view->package = $this->model->get_all_packages();
        $this->view->render('admin/stocks');
    }

    function stocks_report() {
        $this->view->render('admin/stocks_report_today', true);
    }

    function settings() {
        $this->view->render('admin/settings');
    }

    function payments() {
        $this->view->render('admin/payments');
    }

    function reports_summary() {
        $this->view->render('admin/reports_summary');
    }

    function test() {
        $this->view->render('admin/test');
    }

    function get_all_products() {

        $this->model->get_all_products();
    }

    public function get_all_customers() {

        $this->model->get_all_customers();
    }

    public function get_all_packages() {

        $this->model->get_all_packages();
    }

    public function save_new_customer() {

        $this->model->save_new_customer();
    }

    public function get_stock_master() {

        $this->model->get_stock_master();
    }

    public function get_current_stocks() {

        $this->model->get_current_stocks();
    }

    public function insert_order_temp() {
        $this->model->insert_order_temp();
    }

    public function stock_transfer() {
        $this->view->package = $this->model->get_all_packages();
        $this->view->render('admin/stock_transfer');
    }

    public function print_invoice($order_id) {

        $this->view->invoice_data = $this->model->print_invoice_data($order_id);
        $this->view->render('admin/print_invoice', true);
    }

    public function print_stn($stn_id) {
        $this->view->stn_data = $this->model->print_stn_data($stn_id);
        $this->view->render('admin/print_stn', true);
    }

    public function print_challan($order_id) {

        $this->view->invoice_data = $this->model->print_invoice_data($order_id);
        $this->view->render('admin/print_challan', true);
    }

    function get_discounts($customer_id) {

        $this->model->get_discounts($customer_id);
    }

    function get_taxes($customer_id) {

        $this->model->get_taxes($customer_id);
    }

    function get_customer_outstanding($customer_id) {

        $this->model->get_customer_outstanding($customer_id);
    }

    function save_changed_password() {

        $this->model->save_changed_password();
    }

    function sales_report() {

        $this->view->render('admin/reports/sales');
    }

    function logout() {
        Session::destroy();
        header('location: ' . URL);
        exit;
    }

}