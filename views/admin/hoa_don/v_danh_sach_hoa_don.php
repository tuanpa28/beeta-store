<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Quản lý hóa đơn</h1>

                </div>

                <!-- <div class="col-sm-auto">
          <a class="btn btn-primary" href="index.php?act=them_danh_muc">Thêm danh mục</a>
        </div> -->
            </div>
            <!-- End Row -->
            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="tio-chevron-left"></i>
                    </a>
                </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="tio-chevron-right"></i>
                    </a>
                </span>

                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs" id="pageHeaderTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="v_hoa_don.php">Tất cả hóa đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Archived</a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->



        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Tìm kiếm hóa đơn" aria-label="Search">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>


                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 4, 9],
                        "width": "5%",
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 12,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                    <thead class="thead-light">
                        <tr>
                            <!-- <th scope="col" class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                  <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                  <label class="custom-control-label" for="datatableCheckAll"></label>
                </div>
                            </th> -->
                            <th>Mã hóa đơn</th>
                            <th>Ngày đặt hàng</th>
                            <th>Mã khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                            <th>Tình trạng</th>
                            <th style="padding-left:48px;">Điều khiển</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($listhoadon as $hoadon) {
                            extract($hoadon);
                            $xem_ct_hoa_don = "index.php?act=xem_ct_hoa_don&id=" . $id_hd;
                            $xoa_hd = "index.php?act=xoa_hd&id=" . $id_hd;
                            if ($thanh_toan == 2) {
                                $tt = "Chuyển khoản trực tiếp";
                            } else if ($thanh_toan == 1) {
                                $tt = "Thanh toán khi nhận hàng";
                            } else if ($thanh_toan == 3) {
                                $tt = "Ngân hàng liên kết";
                            }
                            if ($tinh_trang == 0) {
                                $tt_thanh_toan = "Đã thanh toán";
                            } else if ($tinh_trang == 1) {
                                $tt_thanh_toan = "Chưa thanh toán";
                            } else if ($tinh_trang == 2) {
                                $tt_thanh_toan = "Đơn hàng bị hủy";
                            }

                        ?>

                            <tr>
                                <td><?= $id_hd ?></td>
                                <td><?= $ngay_hd ?></td>
                                <th><?= $id_kh ?></th>
                                <th><?= $gia_tien ?></th>
                                <th><?= $tt ?></th>
                                <th><?= $tt_thanh_toan ?></th>
                                <td>
                                    <div class="btn-group" role="group">


                                        <!-- Unfold -->
                                        <div class="hs-unfold btn-group">


                                            <div style="display: flex">
                                                <a style="padding-left:10px; padding-right:10px" class="dropdown-item" href="<?= $xem_ct_hoa_don ?>">
                                                    <i class="fa-solid tio-visible-outlined dropdown-item-icon"></i>Xem chi tiết
                                                </a>
                                                <a style="padding-left:10px; padding-right:10px" class="dropdown-item" href="<?= $xoa_hd ?>">
                                                    <i class="fa-solid fa-trash dropdown-item-icon"></i>Xóa
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End Unfold -->
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            </div>
            <!-- End Table -->
            <?php
            $phantrang_hd = phantrang_hd();
            $row_count = count($phantrang_hd);
            $trang = ceil($row_count / 5);
            // echo $row_count;
            // echo $trang;

            ?>
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <!-- <span class="mr-2">Showing:</span> -->

                            <!-- Select -->
                            <!-- <select id="datatableEntries" class="js-select2-custom select2-hidden-accessible" data-hs-select2-options="{
                            &quot;minimumResultsForSearch&quot;: &quot;Infinity&quot;,
                            &quot;customClass&quot;: &quot;custom-select custom-select-sm custom-select-borderless&quot;,
                            &quot;dropdownAutoWidth&quot;: true,
                            &quot;width&quot;: true
                          }" data-select2-id="datatableEntries" tabindex="-1" aria-hidden="true">
                    <option value="12" selected="" data-select2-id="2">12</option>
                    <option value="14" data-select2-id="3">14</option>
                    <option value="16" data-select2-id="4">16</option>
                    <option value="18" data-select2-id="5">18</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1"><span class="selection"><span class="select2-selection custom-select custom-select-sm custom-select-borderless" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-datatableEntries-container"><span class="select2-selection__rendered" id="select2-datatableEntries-container" role="textbox" aria-readonly="true" title="12"><span>12</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                            <!-- End Select -->

                            <!-- <span class="text-secondary mr-2">of</span> -->

                            <!-- Pagination Quantity -->
                            <!-- <span id="datatableWithPaginationInfoTotalQty">20</span>
                </div> -->
                        </div>

                        <div class="col-sm-auto">
                            <div class="d-flex justify-content-center justify-content-sm-end">
                                <!-- Pagination -->
                                <nav id="datatablePagination" aria-label="Activity pagination">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                        <ul id="datatable_pagination" class="pagination datatable-custom-pagination">
                                            <li class="paginate_item page-item disabled"><a class="paginate_button previous page-link" aria-controls="datatable" data-dt-idx="0" tabindex="0" id="datatable_previous"><span aria-hidden="true">Prev</span></a></li>
                                            <?php
                                            for ($i = 1; $i <= $trang; $i++) {
                                            ?>
                                                <li><a class="paginate_button page-link" aria-controls="datatable" name="trang" data-dt-idx="<?= $i ?>" tabindex="0" href="index.php?act=danh_sach_hoa_don&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                            <?php
                                            }
                                            ?>
                                            <li class="paginate_item page-item"><a class="paginate_button next page-link" aria-controls="datatable" data-dt-idx="4" tabindex="0" id="datatable_next"><span aria-hidden="true">Next</span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->
    </form>
</main>

<!-- ========== END MAIN CONTENT ========== -->