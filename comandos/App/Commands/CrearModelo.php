<?php
namespace Console\App\Commands;
 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
 
class CrearModelo extends Command
{
    protected function configure()
    {
        $this->setName('model')
            ->setDescription('Crea un modelo!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('name', InputArgument::REQUIRED, 'Pass the name.');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Creando el modelo ' . $input->getArgument('name'));
        $modelo = 'app/modelo/'.$input->getArgument('name').'.php';
        $namemoel = $input->getArgument('name');
        $fh = fopen($modelo, 'w');
        
$texto = <<<_END
        <?php
        namespace App\modelo;    
        use Illuminate\Database\Eloquent\Model;
        class $namemoel extends Model{
        }
        _END;  
 if(fwrite($fh, $texto)){
    $output->writeln('Se creo el modelo ' . $input->getArgument('name').' en app/modelo');
    $output->writeln('Creando el controlador ' . $input->getArgument('name'));
    $controlador = 'app/Class/'.$input->getArgument('name').'.php';
    $controllername = $input->getArgument('name');
    $fh = fopen($controlador, 'w');
    $texto = <<<"EOT"
             <?php
             require 'vendor/autoload.php';
             require 'app/Database/DataBase.php';
              use Illuminate\Support\Facades\DB;
              use App\modelo\\$namemoel;
              class Api{
                public function Api(){            
                    \$datos = $namemoel::get();
                    return json_encode(array('datos' => \$datos), JSON_PRETTY_PRINT);
                }            
             }
             EOT;
    if(fwrite($fh, $texto)){
        $output->writeln('Se creo el controlador ' . $input->getArgument('name').' en app/Controller');
    }
 }     
 fclose($fh);       
               
        return 0;
    }
}