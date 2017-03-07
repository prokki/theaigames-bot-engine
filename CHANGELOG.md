## Changes in TheaigameBotEngine

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project TheaigameBotEngine to [Semantic Versioning](http://semver.org/).

### [Unreleased] ### [0.0.3] - 2017-03-XX

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