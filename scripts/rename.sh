#! /usr/bin/env bash

###############################################################################
# Environment
###############################################################################

# get the user input on the plugin name
BASE_DIR=$(pwd)
SCRIPT_DIR=$(dirname "$0")
BASE_FOLDER="${BASE_DIR}/"
NEW_NAME=${1}
DEFAULT_DIR="${BASE_FOLDER}wp-plugin-bp"

# $_ME
#
# Set to the program's basename.
_ME=$(basename "${0}")

###############################################################################
# Help
###############################################################################

# _print_help()
#
# Usage:
#   _print_help
#
# Print the program help information.
_print_help() {
  cat <<HEREDOC
      __      __   __      __   ___                  ___  __
|  | |__) __ |__) |__)    |__) |__  |\ |  /\   |\/| |__  |__)
|/\| |       |    |__)    |  \ |___ | \| /~~\  |  | |___ |  \\
       The WordPress Plugin Boilerplate Renamer script

A tool to quickly rename all the boilerplate files for you. Just run the script
then rename the necessar variables. For more information see the docs:
Main Repo: https://github.com/mallardduck/WordPress-Plugin-Boilerplate
Direct Doc Link: https://goo.gl/fQBhqH

Usage:
  ${_ME} -n [your-plugin-name] [<arguments>]

Options:
  -n | --name  The plugins name; using 'plugin-name' syntax. (Required)
  -v | --verbose  Use verbose output; shows the files being renamed and to where.
  -h | --help  Show this screen.
HEREDOC
}

# Error catching, don't proceed without name input
if [ -z "${1}" ];then
    echo "Note: Plugin name input cannot be empty";
    _print_help;
    exit;
fi

_do_rename_actions() {
    echo "Starting file renames in 4 seconds; stop now if necessary.";sleep 4;
    echo "Running test now.";sleep 2;

    # First rename the main folder...
    if [[ "${VERBOSE}" = 1 ]]; then
        echo "${DEFAULT_DIR}/" "${BASE_DIR}/${NEW_NAME}/";
    fi
    mv "${DEFAULT_DIR}/" "${BASE_DIR}/${NEW_NAME}/"

    # Then loop the files and then rename them...
    for file in $(find "${BASE_DIR}/${NEW_NAME}" -type f |grep -v '.git'|grep 'wp-plugin-bp'); do
        if [[ "${VERBOSE}" = 1 ]]; then
            echo "${file}" "$(echo ${file}|sed "s/wp-plugin-bp/${NEW_NAME}/g")";
        fi
        mv "${file}" "$(echo ${file}|sed "s/wp-plugin-bp/${NEW_NAME}/g")";
    done
}

_do_rename_tests() {
    echo "Running in debug mode. No files will be renamed";sleep 1;
    echo "Running in debug mode. No files will be renamed";sleep 3;echo;
    echo "Running test now.";sleep 2;

    # First rename the main folder...
    echo "${DEFAULT_DIR}/" "${BASE_DIR}/${NEW_NAME}/"

    # Then loop the files and then rename them...
    for file in $(find "${DEFAULT_DIR}" -type f |grep -v '.git'|grep 'wp-plugin-bp'); do
        echo "${file}" "$(echo ${file}|sed "s/wp-plugin-bp/${NEW_NAME}/g")";
    done
}

# set defaults
HELP=0
DEBUG=0 # beginning of range

optspec="dthvn:"
OPTS=`getopt -o "${optspec}" --long debug,test,verbose,help,name: -n 'wp-pb-renamer' -- "$@"`
if [ $? != 0 ] ; then
    echo "Failed parsing options." >&2 ;
    _print_help;
    exit 1 ;
fi

eval set -- "$OPTS"

while true; do
  case "$1" in
        -h|--help)
          HELP="1"
          shift # past argument
          ;;
        -d|--debug)
          DEBUG="1"
          shift # past argument
          ;;
        -t|--test)
          DEBUG="1"
          shift # past argument
          ;;
        -v|--verbose)
          VERBOSE="1"
          shift # past argument
          ;;
        -n|--name )
          NEW_NAME="$2";
          shift
          ;;
        -- ) shift; break ;;
        * ) break ;;
    esac
    shift;
done

###############################################################################
# Main
###############################################################################

# _main()
#
# Usage:
#   _main [<options>] [<arguments>]
#
# Description:
#   Entry point for the program, handling basic option parsing and dispatching.
_main() {
  # Avoid complex option parsing when only one program option is expected.
  if [[ "${HELP}" = 1 ]]
  then
    _print_help
  elif [[ "${DEBUG}" = 1 ]]
  then
    _do_rename_tests
  elif [[ "${1:-}" != ^-*$ ]]
  then
      _do_rename_actions
  fi
}

# Call `_main` after everything has been defined.
_main "${@:-}"

# Then exit since we're done
exit
