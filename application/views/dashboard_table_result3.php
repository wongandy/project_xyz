<table class="room-tracker table" style="width: 65%">
<thead>
<tr>
<?php
foreach($rooms as $room_key => $room_val){
	echo '<th style="color: black;font-weight: 600;font-size: 12px;">'.$room_val->name.'</th>';
}
?>
</tr>
</thead>
<tbody>
<tr>
<?php
if($this->session->userdata('role')!= 3):
	foreach($rooms as $room_key => $room_val){#LOOP ROOMS
		$draw_td = 0;
		$have_reservation = 0;
		foreach($room_occupancy as $ro_key => $ro_val){#LOOP ROOM OCCUPANCY
			$exploded = explode("|", $ro_key);
			$room_id = $exploded[0];
			$check_in = $exploded[1];
			
			if($room_val->id==$room_id AND $draw_td==0){
				echo '<td style="padding: 0;">';
				$draw_td++;
				$have_reservation++;
			}
			
			if($room_val->id==$room_id AND $draw_td!=0){
				$theValues = $ro_val;
				
				if(strtotime($theValues[2])<=strtotime(date('Y-m-d H:i:s')) AND strtotime($theValues[3])>=strtotime(date('Y-m-d H:i:s')))
					$active = '<label><u style="color: black;font-weight: bold;" font-size:12px;">'.date('h:i a', strtotime($theValues[2])).' - '.date('h:i a', strtotime($theValues[3])).'</u></label>';
				else
					$active = '<label style="color: black;font-weight: bold;" font-size:12px;">'.date('h:i a', strtotime($theValues[2])).' - '.date('h:i a', strtotime($theValues[3])).' </label>';
					
				if(strtotime($theValues[2])<=strtotime(date('Y-m-d H:i:s')) AND strtotime($theValues[3])>=strtotime(date('Y-m-d H:i:s')))
					$active2 = '<span class="panel-eyecandy-title"><u style="color: black;font-weight: bold;" font-size:12px;">'.$theValues[4].'</u></span>';
				else
					$active2 = '<span class="panel-eyecandy-title" style="color: black;font-weight: bold;" font-size:12px;">'.$theValues[4].'</span>';
				
				echo '
					<a href="javascript:void(0)" id="additional-person" room_id="'.$room_val->id.'" check_in="'.date('h|i|a', strtotime($theValues[2])).'" mrt_id="'.$theValues[0].'" current_person="'.$theValues[1].'" room_name="'.$room_val->name.'" movie_name="'.$theValues[4].'">
					<div class="panel panel-primary text-center no-boder" style="width:70px;">
						<div class="panel-body '.($theValues[1]==0?($vacant_near_end_id==$theValues[0]?'yellow':'white'):($room_near_end_id==$theValues[0]?'red':'blue')).'">
							
								<i class="fa fa-users fa-3x"></i>
							
							'.$active.'
						</div>
						<div class="panel-footer">
							'.$active2.'
						</div>
					</div>
					</a>
				';
			}
		}#LOOP ROOM OCCUPANCY
		if($have_reservation==0){
			echo '
			<td style="padding: 0;">
				<a href="javascript:void(0)" class="movie-room-check-in" room_id="'.$room_val->id.'" check_in_time="'.date('H:i',strtotime(date('Y-m-d H:i:s'))+60).'">
					<div class="panel panel-primary text-center no-boder" style="width:70px;">
						<div class="panel-body white">
								<i class="fa fa-check-square fa-3x"></i>
							<label style="color: black;font-weight: bold; font-size:12px;">VACANT</label>
						</div>
						<div class="panel-footer">
							<span class="panel-eyecandy-title">Movie Room Check In
							</span>
						</div>
					</div>
					</a>
			</td>
			';
		}else{
			echo '</td>';
		}
	}#LOOP ROOMS
endif;
?>
</tr>
</tbody>
</table>