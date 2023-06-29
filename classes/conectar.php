 <?php
 class Connection
 {
   protected $server;
   protected $user;
   protected $password;
   protected $database;
   public $connection;

   public function conectar()
    {
       
          try 
          {
            $this->connection= mysqli_connect($this->server, $this->user,$this->password, 
            $this->database);
            //mysqli_select_db($this->database); COMENTADO POR BRYAN VALDERRAMA 29-01-2020
            //mysqli_query("SET NAMES 'utf8'"); COMENTADO POR BRYAN VALDERRAMA 28-01-2020
          } 
          catch (ErrorException $e) 
          {
            echo $e->getMessage();
          }

   
  }
  
  public function desconectar()
   {
      try{
          mysqli_close($this->connection);
      }
      catch(ErrorException $e)
      {
          echo $e->getMessage();
      }

      
   }
   
   public function __construct($server1,$user1,$password1,$database1)
   {
     $this->server=$server1;
   $this->user=$user1;
   $this->password=$password1;
   $this->database=$database1;
   }
   
   public function getConnection()
    {
        
         try
         {
           return $this->connection;  
         }
         catch(ErrorException $e)
         {
          echo $e->getMessage();
         }
        
    }
    

 }
?>