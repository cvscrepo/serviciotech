<?php
 class Crud
 {
   protected $registros;
   protected $consulta;
   protected $ultimo_id;
   protected $num_rows;
   protected $mensaje;
   protected $num_s_dec;
   protected $mensaje_exito;

   public function setConsulta($consulta1)
    {
        $this->consulta = $consulta1;
    }

 //seleccionar
 public function seleccionar($conexion)
    {
      $query=$this->consulta;
      //$query->query('SET SQL_BIG_SELECTS=1');      
      $result=mysqli_query($conexion,$query);

      if($result)
       {
         $this->num_rows=mysqli_num_rows($result);
           if($this->num_rows>0)
            { 
               while( $row= mysqli_fetch_assoc($result))
               {
                $this->registros[] = $row;
               }
            }
            else
            {
              $this->mensaje = 'No hay registros asociados a la consulta.';
            }
       } 
       else
        {
       echo mysqli_error($conexion);
        }
   
     return  $this->registros;
  }

//insertar en la tabla
//recuerde ponerle a cada campo del fomrmulario, el nombre del campo en la tabla
     public function insertar($valores,$campos,$tabla,$conexion,$mensaje_exito)
      {
         $i=1;  $sw=0;
         while ($i<=1)//sizeof($valores))
       {
         
        $query= "insert into $tabla ($campos) values ($valores)";

           $result= mysqli_query($conexion,$query);
           if($result)
             {
               echo $mensaje_exito;
               //$this->ultimo_id = mysqli_insert_id($conexion);
             }
             else
               {
                echo mysqli_error($conexion);
               }
            
           $i++;
       }
      }


       public function insertar2($valores,$campos,$tabla,$conexion,$mensaje_exito)
      {
         $i=0;  $sw=0;
         while ($i<sizeof($valores))
       {
         //$query= "insert into $tabla ($campos) values ".$valores[$i].""; 
         $query= "insert into $tabla ($campos[$i]) values('$valores[$i]')";

           $result= mysqli_query($conexion,$query);
           if($result)
             {
               echo $mensaje_exito;
               $this->ultimo_id = mysqli_insert_id();
             }
             else
               {
                echo mysqli_error();
               }
            
           $i++;
       }
      }


    public function insertar3($valores,$campos,$tabla,$conexion)
      {
         $i=0;  $sw=0;
         while ($i<sizeof($valores))
       {
         //$query= "insert into $tabla ($campos) values ".$valores[$i].""; 
         $query= "insert into $tabla ($campos[$i]) values('$valores[$i]')";
             
           $result= mysqli_query($conexion,$query);
           if($result)
             {
               $this->mensaje_exito = 'ok';
               $this->ultimo_id = mysqli_insert_id();
             }
             else
               {
                 $this->mensaje_exito = mysqli_error();
               }
            
           $i++;
       }
      }


 

      public function update($consulta,$mensaje,$conexion)
      {
          
         $query =$consulta;
         $result= mysqli_query($conexion,$query);
         if($result)
         {
            if($mensaje !='no')
               {
                 echo $mensaje;
               }

         }
         else
         {
           echo mysqli_error();
         }

      } 
     
  
  //eliminar
      public function eliminar($tabla,$conexion,$condicion,$mensaje)
       {
         if($condicion != '')
           {
             $where = 'where';
           }
           else
             {
              $where = '';
             }
         $query = "delete from $tabla $where $condicion ";
         $result= mysqli_query($conexion,$query);
         if($result)
          {
            echo $mensaje;
          }  
          else
             {
              echo mysqli_error();
             }

       }
//sacar ultimo id
    public function getLastid()
    {
      return $this->ultimo_id;
    }
    
    //cantidad de tuplas
    public function getTuplas()
    {
      return $this->num_rows;
    }

   public function getMensaje()
    {
      return $this->mensaje;
    }

    public function getValor()
    {
       return $this->num_s_dec;
    }

     public function getMensajeExito()
    {
       return $this->mensaje_exito;
    }

  //quitar las ,'s a los numeros con decimales
  public function moneda_dec($valor)
  {
     $this->num_s_dec = str_replace(",","" ,$valor); 
     
  }  

 }



?>