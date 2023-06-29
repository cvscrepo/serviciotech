<?php
 class Connection
 {
   protected $server;
   protected $user;
   protected $password;
   protected $database;
   protected $connection;

   public function conectar()
    {
       
          try 
          {
            $this->connection= mysql_connect($this->server, $this->user,$this->password);
        mysql_select_db($this->database);
        mysql_query("SET NAMES 'utf8'");
          } 
          catch (ErrorException $e) 
          {
            echo $e->getMessage();
          }

   
  }
  
  public function desconectar()
   {
      try{
          mysql_close($this->connection);
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