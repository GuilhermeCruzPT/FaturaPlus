<?php
class BillLinesController extends BaseController
{
    public function index()
    {
        if (isset($_POST[('search_btn')])) {

            /* ╔═══════════════════════════╗ */
            /* ║     Barra de Pesquisa     ║ */
            /* ╚═══════════════════════════╝ */

            $search = $_POST['search'];
            $bill_lines = Bill_line::find('all',
                array('conditions' => "quantity LIKE '%$search%' 
                or unitary_value LIKE '%$search%'
                or iva_value LIKE '%$search%'
                or product_id LIKE '%$search%'
                or bill_id LIKE '%$search%'"));

            $this->renderViewBackend('bills/index', [
                'bill_lines' => $bill_lines,
            ]);

        } else {
            $bill_lines = Bill_line::all();
            $this->renderViewBackend('lines/index', [
                'bill_lines' => $bill_lines,
            ]);
        }
    }
}