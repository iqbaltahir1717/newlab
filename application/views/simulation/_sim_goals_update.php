    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('sim_goals'); ?>"> sim_goals</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
            unset($_SESSION['alert']);
        } ?>
    </div>
    <!-- Page content -->
    <div class="page-content">
        <!-- Update sim_goals start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <?php echo form_open_multipart("sim_goals/update") ?>
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="submit" class="btn btn-info btn-sm" title="Update data"><i class="bi bi-pencil-square"></i> Ubah</button>
                            <a href="<?php echo site_url('sim_goals') ?>" class="btn btn-warning btn-sm" title="kembali ke halaman sebelumnya"><i class="bi bi-arrow-left"></i> kembali</a>
                        </div>
                    </div>
                    <!-- Update sim_goals -->
                    <div class="row p-4">
                        <div class="col-12">
                            <form action="form">
                                <?php echo csrf(); ?>
                                <div class="form-group">
                                    <label for=""><b>Part <span style="color:red">*</span></b></label>
                                    <select class="form-select" name="sim_goals_part" required style="width:100%">
                                        <option value="">-Pilih Part-</option>
                                        <option <?php if ($sim_goals[0]->sim_goals_part == 'Body') echo 'selected'; ?>>Body</option>
                                        <option <?php if ($sim_goals[0]->sim_goals_part == 'Skin') echo 'selected'; ?>>Skin</option>
                                        <option <?php if ($sim_goals[0]->sim_goals_part == 'Teeth') echo 'selected'; ?>>Teeth</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sim_goals_text">Text<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" placeholder="simulation goals Text" name="sim_goals_text" required="required" value="<?php echo $sim_goals[0]->sim_goals_text; ?>">
                                    <input type="hidden" class="form-control" name="sim_goals_id" required="required" value="<?php echo $sim_goals[0]->sim_goals_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="user_group">Product </label>
                                    <select multiple class="choices form-control" name="product[]" required>
                                        <option value="">- Select Product -</option>
                                        <?php
                                        foreach ($product as $g) {
                                            if (in_array($g->product_id, explode(';', $sim_goals[0]->product))) {
                                                echo '<option value="' . $g->product_id . '" selected>' . $g->product_name . '</option>';
                                            } else {
                                                echo '<option value="' . $g->product_id . '">' . $g->product_name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
        </section>
        <!-- Update sim_goals end -->
    </div>