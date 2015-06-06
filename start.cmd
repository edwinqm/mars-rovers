@echo off

:Menu
cls
echo.
echo Seleccione su opcion tecleando el numero respectivo:
echo.
echo 1. Iniciar Programa
echo 2. Segunda Opcion
echo 3. Salir
echo.

set /p var= Inserte el numero de la opcion:

if %var%==1 goto :Primero
if %var%==2 goto :Segundo
if %var%==3 exit
if %var% GTR 3 echo Error

pause>nul
goto :Menu

:Primero
cls
echo.
echo Introduzca la ruta del archivo de comandos para iniciar la aplicacion
echo ejemplo: c:\comandos\archivo.txt
echo.
set /p path= ruta:
START copy %path% comandos.txt exit
START http://localhost/mars-rovers
echo.
echo Los resultados se mostraran en su explorador...
echo.
echo Presione una tecla para volver al menu.
pause>nul
goto :Menu

:Segundo
cls
echo.
echo Esta es la segunda opcion
echo Presione una tecla para volver al menu.
pause>nul
goto :Menu