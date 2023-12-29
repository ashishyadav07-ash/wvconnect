<!-- < ?php echo "<pre>";print_r($highestMark); die(); ?> -->
<div class="box-container">
    <?php  foreach ($awards as $val) { ?>
        <div class="square-box">
            <div class="resultHead">
                <p><?php echo $val['awardHeading']; ?></p>
            </div>
           <?php  
        //    foreach ($highestMark as $value) { 
        //     $value[] = $value;
        //    }
        //    echo "<pre>";print_r($value); die();
        //     foreach ($value as $data) { 
             
        //     if($data['awardCategory'] != ''){
                // echo "<pre>";print_r($data); die();
                // $this->db->select('*');
                // $this->db->from('fx_jury_assign_nominee');
                // $this->db->where('awardCategory', $data['awardCategory']);
                // $this->db->where('totalRemark', $data['highest_totalRemark']);
                // $this->db->limit(1);  // Apply LIMIT 1
                // $records =  $this->db->get()->row_array();
               
                // echo "<pre>";print_r($records); die();
            ?>
            <p>Score: 10 </p>
            <p>Name: Guddu Pandit</p>
            <p>ID: 001 </p>
             <?php 
        //     }
             
        //    } } 
           ?>
        </div>
    <?php } ?>
</div>

<style>

    .box-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 10% auto;
        
    }

    .square-box {
        width: 330px;
        height: 180px;
        background-color: gainsboro;
        text-align: left;
        padding: 21px;
        margin: 10px;
    }

    .resultHead {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .square-box p {
        margin: 0;
        line-height: 1.5;
    }
    </style>