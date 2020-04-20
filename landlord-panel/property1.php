<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
$id= $_SESSION['id'];

 $select_enquiry="SELECT * FROM property WHERE prop_landlord_id= '".$_SESSION['id']."' ";
 $sql=$dbconn->prepare($select_enquiry);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
	
	
?>

<?php

//while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
//{ 
if($sql->rowCount() > 0){
	foreach($wlvd as $rows){
$id = $rows->id;
$prop_name= $rows->prop_name;
$prop_price= $rows->prop_price;
$prop_address= $rows->prop_address;
$prop_desc= $rows->prop_desc;
$prop_city= $rows->prop_city;
$prop_location= $rows->prop_location;
$prop_state = $rows->prop_state;
$prop_image1 = $rows->prop_image1;
$prop_image2 = $rows->prop_image2;
$prop_image3 = $rows->prop_image3;
$prop_image4 = $rows->prop_image4;
$prop_image5 = $rows->prop_image5;

 
?>
							






											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $prop_name; ?></td>
                                        <td class="center">₹<?php echo $prop_price; ?></td>
                                        <td class="center"><?php echo $prop_address; ?></td>
                                        
                                        <td class="center"><?php echo $prop_city; ?></td>
                                        
                                        <td class="center"><?php echo $prop_state; ?></td>
                                        
                              

										
										<td class="center"><a href="property_edit.php?id=<?php echo $id; ?>&start=2"target="_self">Edit</a> 
										
										<td class="center"><a href="property_del.php?id=<?php echo $id; ?>&start=2"target="_self">Delete</a>
										
															
											
									</tr>	
										<?php } } ?>
										</tbody>
									</table>
								</div>
								