## Changes in TheaigameBotEngine

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project TheaigameBotEngine to [Semantic Versioning](http://semver.org/).

### [0.1.2] - 2017-03-14

#### Fixed
* [RoundBasedEnvironment](src/Game/RoundBasedEnvironment.php) is included via inheritance and not via trait. 

### [0.1.1] - 2017-03-14

#### Fixed
* Implemented missing Exception in [RoundBasedEnvironment](src/Game/RoundBasedEnvironment.php). 

### [0.1.0] - 2017-03-08

#### Fixed
* Class AI renamed to [Bot](src/Bot.php).
* Removed namespace from functions file.

#### Changed
* Moved class [Bot](src/Bot.php) to [src](src/) directory.
* Extended Client with  method _WaitForMinCompuitationTime().

### [0.0.2] - 2017-03-03

#### Fixed
* Docblock and parameters in [Client](src/Client.php).

#### Added
* Introduced [EnvironmentFactory](src/Game/EnvironmentFactory.php) to use overridden environmental classes in custom bot implementations.
* Created [RoundBasedEnvironmentFactory](src/Game/RoundBasedEnvironmentFactory.php) to use factory pattern for round based games, adapted class [RoundBasedEnvironmentFactory](src/Game/RoundBasedEnvironment.php) to use factory.
* Added exception [RuntimeException](src/Exception/RuntimeException.php) to indicate error on EnvironmentFactory.

### [0.0.1] - 2017-03-02

#### Added
* First version