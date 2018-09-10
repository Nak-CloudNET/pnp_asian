<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice&nbsp;<?= $invs->reference_no ?></title>
    <link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">

</head>

<style>
    .container {
        width: 100%;
        margin: 20px auto;
        padding: 10px;
        font-size: 14px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        position: relative;
    }

    .title-header tr {
        border: 1px solid #000 !important;
    }

    .border td, .border th {
        border: 1px solid #000 !important;
        border-top: 1px solid #000 !important;
    }

    #footer p:first-child {
        font-family: Khmer OS Siemreap;
        font-weight: bold;
    }

    .thead th {
        font-family: Khmer OS Siemreap !important;
    }

    @media print {
        .container {
            width: 95% !important;
            margin: 0 auto !important;
            margin-top: 20px !important;
        }

        .pageBreak {
            page-break-after: always;
            -webkit-page-break-after: always;
        }

        .customer_label {
            padding-left: 0 !important;
        }

        tbody {
            display: table-row-group;
            -webkit-print-color-adjust: exact;
        }

        tfoot {
            display: table-footer-group;
            -webkit-display: table-footer-group;
            page-break-after: always;
        }

        .invoice_label {
            padding-left: 0 !important;
        }

        #footer {
            position: fixed;
            bottom: 20px !important;
        }

        #footer .col-sm-4:first-child {
            margin-left: -20px !important;
        }

        #note {
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
        }

        .col-xs-12, .col-sm-12 {
            padding-left: 1px;
            padding-right: 1px;
            margin-left: 0px;
            margin-right: 0px;
        }

        table {
            border-collapse: collapse;
        }

        .col-sm-8, .col-sm-7, .col-sm-4, .col-sm-3 {
            padding-left: 0px !important;
        }

        .col-sm-6 {
            width: 400px !important;
        }

    }

    body {
        font-size: 12px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }

    .header {
        font-family: "Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }

    .table > thead > tr > th, .table > thead > tr > td, tbody > tr > th, .table > tfoot > tr > th, .table > tbody > tr > td, .table > tfoot > tr > td {
        padding: 5px;
    }

    .title {
        font-family: "Khmer Mool1";
        -mox-font-family: "Khmer Mool1";
        font-size: 20px;
    }

    h4 {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .noPadding tr {
        padding: 0px 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border: none;
    }

    .noPadding tr td {
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border: 1px solid white;
    }

    .border-foot td {
        border: 1px solid #000 !important;
        vertical-align: middle !important;
    }

    thead tr th {
        font-weight: normal;
        text-align: center;
    }

    .myhide h1 {
        font-family: "Khmer Mool1";
        -mox-font-family: "Khmer Mool1";
        font-size: 31px;
    }

    .myhide h3 {
        margin-top: -8px;
        font-size: 21px;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#hide").click(function () {
            $(".myhide").toggle();
        });
    });
</script>
<body>
<div class="container" style="width: 821px;margin: 0 auto;">
    <div class="col-xs-12"
    <?php
    $cols = 6;
    if ($discount != 0) {
        $cols = 7;
    }
    ?>
    <div class="row">
        <div class="col-sm-12 col-xs-12" style="padding-right: 0">
            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="border-radius: 0"
                    onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('print'); ?>
            </button>
            <!--<button type="button" class="btn btn-xs btn-default no-print pull-right " id="hide" style="margin-right:10px; border-radius: 0" onclick="">
                <i class="fa"></i> <? /*= lang('Hide/Show_header'); */ ?>
            </button>-->
        </div>
        <table class="table">
            <thead>
            <tr class="thead" style="border-left:none;border-right: none;border-top:none;">
                <th colspan="9"
                    style="border-left:none;border-right: none;border-top:none;border-bottom: 1px solid #000 !important;">
                    <div class="row" style="margin-top: 0px !important;">
                        <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                            <?php if (!empty($biller->logo)) { ?>
                                <img class="img-responsive myhide"
                                     src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>" id="hidedlo"
                                     style="width: 168px;margin-top: -20px;"/>
                            <?php } ?>
                        </div>
                        <div class="col-sm-6 col-xs-6 company_addr " style="margin-top: -20px !important;">
                            <div class="myhide">
                                <center>
                                    <?php if ($biller->company) { ?>
                                        <h1><?= $biller->name ?></h1>
                                        <h3><?= $biller->company ?></h3>
                                    <?php } ?>
                                </center>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-3"></div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-8 col-xs-8 text-left">
                            <p>លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                            <p style="margin-top:-10px !important;">អាសយដ្ឋាន &nbsp;<?= $biller->cf4; ?></p>
                            <p style="margin-top:-10px !important;">Address &nbsp;<?= $biller->address; ?></p>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <p style="margin-top:-10px ;">ទូរស័ព្ទលេខ (Tel):&nbsp;<?= $biller->phone; ?></p>
                        </div>
                    </div>
                    <div class="invoice">
                        <center>
                            <h4 class="title">វិក័យបត្រអាករ</h4>
                            <h4 class="title" style="margin-top: 3px;">TAX INVOICE</h4>
                        </center>
                    </div>
                    <div class="row" style="text-align: left;">
                        <div class="col-sm-7 col-xs-7">
                            <table>
                                <?php if (!empty($customer->company)) { ?>
                                    <tr>
                                        <td>ក្រុមហ៊ុន​​​​​​: <?= $customer->company ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>Company Name: <?= $customer->company ?></td>
                                </tr>
                                <?php if (!empty($customer->address_kh || $customer->address)) { ?>
                                    <tr>
                                        <td>Address:
                                            <?php if (!empty($customer->address_kh)) { ?>
                                            <?= $customer->address_kh ?></td>
                                        <?php } else { ?>
                                            <?= $customer->address ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                <?php if (!empty($customer->address_kh || $customer->address)) { ?>
                                    <tr>
                                        <td>ទូរស័ព្ទលេខៈ <?= $customer->phone ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if (!empty($customer->vat_no)) { ?>
                                    <tr>
                                        <td>លេខអត្តសញ្ញាណកម្ម អតប <?= $customer->vat_no ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="col-sm-5 col-xs-5">
                            <table class="noPadding" border="none">
                                <tr>
                                    <td style="width: 45%;">លេខវិក័យបត្រ / Invoice No:</td>
                                    <td style="width: 50%;"><?= $invs->reference_no ?></td>
                                </tr>
                                <tr>
                                    <td>កាលបរិច្ឆេទ / Date:</td>
                                    <td><?= $this->erp->hrld($invs->date); ?></td>
                                </tr>
                                <!--<tr>
                                    <td>អ្នកលក់ / Sale Man</td>
                                    <td>:</td>
                                    <td><? /*= $invs->saleman; */ ?></td>
                                </tr>-->
                            </table>
                        </div>
                    </div>
                </th>
            </tr>
            <?php
            $total_item_disc = 0;
            foreach ($rows as $row) {
                $total_item_disc += $row->item_discount;
                $total_item_tax += $row->item_tax;
            }
            ?>
            <tr class="border thead print">
                <th style="width: 5%; vertical-align: middle"><?= strtoupper(lang('item')) ?></th>
                <th style="width: 52%">ឈ្មោះទំនិញ<br/><?= lang('description') ?></th>
                <th>បរិមាណ<br/><?= lang('quantity') ?></th>
                <th>ខ្នាត<br/><?= lang('unit') ?></th>
                <th>តម្លៃ<br/><?= lang('price') ?></th>

                <?php if ($total_item_disc) { ?>
                    <th>បញ្ចុះតម្លៃ<br/><?= lang('discount') ?></th>
                <?php } ?>
                <?php if ($total_item_tax) { ?>
                    <th style="width: 10%">ពន្ធទំនិញ<br/><?= lang('tax') ?></th>
                <?php } ?>
                <th style="width: 15%">តម្លៃសរុប<br/><?= lang('amount') ?></th>
            </tr>
            </thead>
            <tbody>

            <?php

            $no = 1;
            $erow = 1;
            $totalRow = 0;
            foreach ($rows as $row) {
                $free = lang('free');
                $product_unit = '';
                $total = 0;

                if ($row->variant) {
                    $product_unit = $row->variant;
                } else {
                    $product_unit = $row->uname;
                }
                $product_name_setting;
                if ($setting->show_code == 0) {
                    $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                } else {
                    if ($setting->separate_code == 0) {
                        $product_name_setting = $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
                    } else {
                        $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                    }
                }
                ?>
                <tr class="border">
                    <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: center"><?php echo $no ?></td>
                    <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle;">
                        <?= $row->product_name; ?>
                    </td>
                    <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: center">
                        <?= $this->erp->formatQuantity($row->quantity); ?>
                    </td>
                    <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: center">
                        <?= $product_unit ?>
                    </td>
                    <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: right">
                        <?php
                        if ($row->real_unit_price == 0) {
                            echo "Free";
                        } else {
                            echo $this->erp->formatMoney($row->real_unit_price);
                        }
                        ?>
                    </td>
                    <?php if ($total_item_disc) { ?>
                        <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: center">

                            <?php
                            if (strpos($row->discount, "%")) {
                                echo "<small style='font-size:10px;'>(" . $row->discount . ")</small>";
                            }
                            echo $this->erp->formatMoney($row->item_discount);
                            ?>
                        </td>
                    <?php } ?>
                    <?php if ($total_item_tax) { ?>
                        <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: center">
                            <?= $this->erp->formatMoney($row->item_tax); ?></td>
                    <?php } ?>
                    <td style="border-top:none !important;border-bottom:none !important;vertical-align: middle; text-align: right">
                        <?php
                        if ($row->subtotal == 0) {
                            echo "Free";
                        } else {
                            echo $this->erp->formatMoney($row->subtotal);
                        }
                        ?>
                    </td>
                </tr>

                <?php
                $no++;
                $erow++;
                $totalRow++;
            }
            ?>
            <?php

            if ($erow < 13) {
                $k = 13 - $erow;
                for ($j = 1; $j <= $k; $j++) {
                    if ($total_item_disc != 0 AND $total_item_tax != 0) {
                        echo '<tr class="border">
                                <td height="34px" style="border-top:none !important;border-bottom:none !important;text-align: center; vertical-align: middle"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                </tr>';
                    } elseif ($total_item_tax != 0) {
                        echo '<tr class="border">
                                <td height="34px" style="border-top:none !important;border-bottom:none !important;text-align: center; vertical-align: middle"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                </tr>';
                    } elseif ($total_item_disc != 0) {
                        echo '<tr class="border">
                                <td height="34px" style="border-top:none !important;border-bottom:none !important;text-align: center; vertical-align: middle"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                </tr>';
                    } else {
                        echo '<tr class="border">
                                <td height="34px" style="border-top:none !important;border-bottom:none !important;text-align: center; vertical-align: middle"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                <td style="border-top:none !important;border-bottom:none !important;"></td>
                                </tr>';
                    }
                    $no++;
                }
            }
            ?>
            <?php
            $row = 1;
            $col = 3;
            if ($total_item_disc != 0) {
                $col = 4;
            }
            if ($total_item_tax != 0) {
                $col = 4;
            }
            if ($total_item_disc != 0 && $total_item_tax != 0) {
                $col = 5;
            }
            if ($invs->grand_total != $invs->total) {
                $row++;
            }
            if ($invs->order_discount != 0) {
                $row++;
                $col = 5;
            }
            if ($invs->shipping != 0) {
                $row++;
                $col = 5;
            }
            if ($invs->order_tax != 0) {
                $row++;
            }
            if ($invs->paid != 0 && $invs->deposit != 0) {
                $row += 3;
            } elseif ($invs->paid != 0 && $invs->deposit == 0) {
                $row += 2;
            } elseif ($invs->paid == 0 && $invs->deposit != 0) {
                $row += 2;
            }
            ?>

            <?php
            if ($invs->grand_total != $invs->total) { ?>
                <tr class="border-foot">
                    <td rowspan="<?= $row; ?>" colspan="2"
                        style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                        <?php if (!empty($invs->invoice_footer)) { ?>
                            <p style="margin-top:10px !important; line-height: 2"><?= nl2br($invs->invoice_footer) ?></p>
                        <?php } ?>
                    </td>
                    <td colspan="<?= $col; ?>"
                        style="text-align: right; font-weight: bold; font-family: Khmer OS Siemreap;">សរុប​
                        <br/> <?= lang('sub_total') ?>
                    </td>
                    <td align="right"><?= $this->erp->formatMoney($invs->total); ?></td>
                </tr>
            <?php } ?>

            <?php if ($invs->order_discount != 0) : ?>
                <tr class="border-foot">
                    <td colspan="<?= $col; ?>"
                        style="text-align: right; font-weight: bold;font-family: Khmer OS Siemreap;">បញ្ចុះតម្លៃ
                        / <?= strtoupper(lang('order_discount')) ?></td>
                    <td align="right">
                        <small style='font-size:10px;'>(<?php echo $invs->order_discount_id; ?>%)
                        </small>&nbsp;<?php echo $this->erp->formatMoney($invs->order_discount); ?></td>
                </tr>
            <?php endif; ?>

            <?php if ($invs->shipping != 0) : ?>
                <tr class="border-foot">
                    <td colspan="<?= $col; ?>"
                        style="text-align: right; font-weight: bold; font-family: Khmer OS Siemreap;">ដឹកជញ្ជូន
                        / <?= strtoupper(lang('shipping')) ?></td>
                    <td align="right"><?php echo $this->erp->formatMoney($invs->shipping); ?></td>
                </tr>
            <?php endif; ?>

            <?php if ($invs->order_tax != 0) : ?>
                <tr class="border-foot">
                    <td colspan="<?= $col; ?>"
                        style="text-align: right; font-weight: bold;font-family: Khmer OS Siemreap;">អាករលើតម្លៃបន្ថែម
                        <br/><?= lang('vat') ?>
                        <?php
                        $vat_percent = explode('@', strstr($invs->vat, '@', false));
                        echo $vat_percent[1];
                        ?>
                    </td>
                    <td align="right"><?= $this->erp->formatMoney($invs->order_tax); ?></td>
                </tr>
            <?php endif; ?>

            <tr class="border-foot">
                <?php if ($invs->grand_total == $invs->total) { ?>
                    <td rowspan="<?= $row; ?>" colspan="2"
                        style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                        <?php if (!empty($invs->invoice_footer)) { ?>
                            <p style="margin-top: 10px"><?= nl2br($invs->invoice_footer) ?></p>
                        <?php } ?>
                    </td>
                <?php } ?>
                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;font-family: Khmer OS Siemreap;">
                    សរុប <br/><?= strtoupper(lang('grand_total')) ?>
                </td>
                <td align="right">
                    <?php
                    if ($invs->grand_total == 0) {
                        echo "Free";
                    } else {
                        echo $this->erp->formatMoney($invs->grand_total);
                    }
                    ?>
                </td>
            </tr>
            <?php if ($invs->paid != 0 || $invs->deposit != 0) { ?>
                <?php if ($invs->deposit != 0) { ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>"
                            style="text-align: right; font-weight: bold;font-family: Khmer OS Siemreap;">បានកក់
                            / <?= lang('deposit') ?>
                        </td>
                        <td align="right"><?php echo $this->erp->formatMoney($invs->deposit); ?></td>
                    </tr>
                <?php } ?>
                <?php if ($invs->paid != 0) { ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>"
                            style="text-align: right; font-weight: bold;font-family: Khmer OS Siemreap;">បានបង់
                            / <?= lang('paid') ?>
                        </td>
                        <td align="right"><?php echo $this->erp->formatMoney($invs->paid - $invs->deposit); ?></td>
                    </tr>
                <?php } ?>
                <tr class="border-foot">
                    <td colspan="<?= $col; ?>"
                        style="text-align: right; font-weight: bold;font-family: Khmer OS Siemreap;">សមតុល្យ
                        / <?= lang('balance') ?>
                    </td>
                    <td align="right"><?= $this->erp->formatMoney($invs->grand_total - (($invs->paid - $invs->deposit) + $invs->deposit)); ?></td>
                </tr>
            <?php } ?>

            </tbody>
            <tfoot class="tfoot">
            <tr>
                <th colspan="9">
                    <?php if (trim(htmlspecialchars_decode($invs->note))) { ?>
                        <div style="border-radius: 5px 5px 5px 5px;border:1px solid black;height: auto;" id="note"
                             class="col-md-12 col-xs-12">
                            <p style="margin-left: 10px;margin-top:10px;"><?php echo strip_tags($invs->note); ?></p>
                        </div>
                        <br><br><br><br>
                    <?php } ?>
                    <!--<div class="clear-both">
                        <div style="width:100%;height:80px"></div>
                    </div>-->
                    <div id="footer" class="row" style="margin-top: 70px">
                        <div class="col-sm-4 col-xs-4">
                            <center>
                                <hr style="margin:0; border:1px solid #000; width: 80%">
                                <p style=" margin-top: 4px !important">ហត្ថលេខា និងឈ្មោះអ្នកទិញ</p>
                                <p style="margin-top:-10px; ">Customer's Signature & Name</p>
                            </center>
                        </div>
                        <div class="col-sm-4 col-xs-4">&nbsp;</div>
                        <div class="col-sm-4 col-xs-4">
                            <center>
                                <hr style="margin:0; border:1px solid #000; width: 80%">
                                <p style="margin-top: 4px !important">ហត្ថលេខា និងឈ្មោះអ្នកលក់</p>
                                <p style="margin-top:-10px;">Seller's Signature & Name</p>
                            </center>
                        </div>
                    </div>
                </th>
            </tr>
            </tfoot>

        </table>
    </div>

    <div style="width: 821px;margin: 20px">
        <a class="btn btn-warning no-print" href="<?= site_url('sales'); ?>" style="border-radius: 0">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
        </a>
    </div>
</div>

</body>
</html>